<?php

namespace App\Controller;

use App\Entity\Infos;
use App\Form\InfosType;
use App\Repository\InfosRepository;
use App\Service\PdfService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mime\Email;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/infos')]
class InfosController extends AbstractController
{

    #[Route('/new', name: 'app_infos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, InfosRepository $infosRepository,MailerInterface $mailer): Response
    {
        $info = new Infos();
        $user = $this->getUser();
        $infoUser = $infosRepository->findBy(['user'=>$user]);
        $form = $this->createForm(InfosType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $image = $form->get('permissionStudy')->getData();
            if(isset($image))
            {   
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();
                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );   
                
                $info->setPermissionStudy($fichier);
            }
            $info->setIsSend(1);
            $infosRepository->add($info, true);
            $email = (new Email())
                ->from('service_hebergement@gmail.com')
                ->to($info->getEmail())
                ->subject('mail d’appel à candidature !')
                ->text('Votre dossier a été bien envoyé !')
                ->html('
                <h3>Bonjour'.$info->getSurname().'</3><br>
                <p>
                    Nous attendons avec impatience notre entretien demain ! [Nom du recruteur/responsable du
                    recrutement] vous rencontrerez sur notre plateforme .
                </p><br>
                <p>
                    Si possible, essayez de vous connecter quelques minutes plus tôt pour vous assurer que
                    votre caméra et votre microphone fonctionnent correctement. Si vous rencontrez des
                    problèmes techniques, nhésitez pas à me contacter par e-mail ou à mappeler au
                    555-6666.]
                </p><br>
                <p>A bientôt !</p><br>');
    
            $mailer->send($email);
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('infos/new.html.twig', [
            'info' => $info,
            'form' => $form,
            'infoUser'=>$infoUser
        ]);
    }

    #[Route('/ma_demande', name: 'app_ma_demande', methods: ['GET'])]
    public function ma_demande( InfosRepository $infosRepository): Response
    {
        $user = $this->getUser();
        $infoUser = $infosRepository->findBy(['user'=>$user]);

        return $this->render('infos/ma_demande.html.twig', [
            'info' => $infoUser,
        ]);
    }
    #[Route('/{id}', name: 'app_infos_show', methods: ['GET'])]
    public function show(Infos $info): Response
    {
        return $this->render('infos/show.html.twig', [
            'info' => $info,
        ]);
    }
    
    #[Route('/pdf/{id}', name: 'dossier_pdf')]
    public function generatePdf(Infos $info = null, PdfService $pdf)
    {

        
        $html = $this->render('infos/show.html.twig',['info'=>$info]);
        $pdf->showPdfFile($html);
    }

}
