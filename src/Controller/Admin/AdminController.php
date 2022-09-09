<?php

namespace App\Controller\Admin;

use App\Entity\Mail;
use App\Entity\Infos;
use App\Form\MailType;
use Symfony\Component\Mime\Email;
use App\Repository\MailRepository;
use App\Repository\InfosRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
        ]);
    }
    #[Route('/admin/dossier', name: 'app_admin_dossier')]
    public function gestion(InfosRepository $infosRepository): Response
    {
        $infos = $infosRepository->findAll();
        return $this->render('admin/gestion_dossier.html.twig', [
            'infos'=>$infos
        ]);
    }
   
    #[Route('/admin/mail', name: 'app_admin_mail')]
    public function Mail(InfosRepository $infosRepository,MailerInterface $mailer,MailRepository $mailRepository, Request $request): Response
    {
        $dossier_id = $request->query->get('id');
        $infos = $infosRepository->find(['id'=>$dossier_id]);

      
        $mail = new Mail();
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mailRepository->add($mail, true);

            return $this->redirectToRoute('app_admin', [], Response::HTTP_SEE_OTHER);
        }

        $email = (new Email())
        ->from('service_hebergement@gmail.com')
        ->to($infos->getEmail())
        ->subject(' mail d’appel de présélection!')
        ->text('Votre dossier a été bien analysé !')
        ->html('
        <h3>Bonjour  '.$infos->getSurname().'</3><br>
        <p>
            A la suite de nos différents entretiens, nous avons le plaisir de vous informer que votre
            candidature au poste de (indiquer la fonction), a été retenue.
        </p><br>
        <p>
            Afin de procéder à une étude approfondie de votre candidature, nous souhaiterions avoir un
            entretien complémentaire avec vous et vous faire passer une série de tests
        </p><br>
        <p>
            Nous nous tenons à votre disposition pour toutes précisions qu’il vous plairait de nous
            demander.
        </p><br>
        <p>
            Nous vous remercions de bien vouloir prendre contact avec notre service recrutement le
            plus rapidement possible afin que nous puissions nous rencontrer.
            </p><br>
        <p> Cordialement !</p><br>');

    $mailer->send($email);
        return $this->render('admin/gestion_dossier.html.twig', [
            'infos'=>$infos,
            'form' => $form,
        ]);
    }

    #[Route('/admin/mail_accept', name: 'app_admin_mail_accept')]
    public function MailAccept(InfosRepository $infosRepository,MailerInterface $mailer,MailRepository $mailRepository, Request $request): Response
    {
        $dossier_id = $request->query->get('id');
        $infos = $infosRepository->find(['id'=>$dossier_id]);

      
        $mail = new Mail();
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mailRepository->add($mail, true);

            return $this->redirectToRoute('app_admin', [], Response::HTTP_SEE_OTHER);
        }

        $email = (new Email())
        ->from('service_hebergement@gmail.com')
        ->to($infos->getEmail())
        ->subject(' mail d’appel de présélection!')
        ->text('Votre dossier a été bien analysé !')
        ->html('
        <h3>Bonjour  '.$infos->getSurname().'</3><br>
        <p>
        Faisant suite à notre entretien, nous avons le plaisir de vous confirmer votre
        embauche à compter du [date] en qualité de [emploi].
        </p><br>
        <p>
        Nous sommes ravis de lintérêt que vous avez démontré pour notre entreprise
        et nous sommes convaincus que votre parcours et vos compétences
        conviendront parfaitement au projet de lentreprise
        </p><br>
        <p>
        Pour finaliser votre recrutement, nous vous remercions de prendre contact
        avec le service des ressources humaines au [numéro] afin de préparer votre
        contrat de travail selon les termes que nous avons convenus lors de
        lentretien.
        </p><br>
        <p>
        En vous remerciant par avance, je vous prie dagréer, Madame, à mes
        salutations distinguées.
            </p><br>
        <p> Cordialement !</p><br>');

    $mailer->send($email);
        return $this->render('admin/gestion_dossier.html.twig', [
            'infos'=>$infos,
            'form' => $form,
        ]);
    }
    #[Route('/admin/mail_refust', name: 'app_admin_mail_refus')]
    public function MailRefust(InfosRepository $infosRepository,MailerInterface $mailer,MailRepository $mailRepository, Request $request): Response
    {
        $dossier_id = $request->query->get('id');
        $infos = $infosRepository->find(['id'=>$dossier_id]);

      
        $mail = new Mail();
        $form = $this->createForm(MailType::class, $mail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mailRepository->add($mail, true);

            return $this->redirectToRoute('app_admin', [], Response::HTTP_SEE_OTHER);
        }

        $email = (new Email())
        ->from('service_hebergement@gmail.com')
        ->to($infos->getEmail())
        ->subject(' mail d’appel de présélection!')
        ->text('Votre dossier a été bien analysé !')
        ->html('
        <h3>Bonjour  '.$infos->getSurname().'</3><br>
        <p>
            En réponse à votre candidature au poste de [métier] que nous avons reçu le [date], nous
            sommes au regret de vous informer que votre candidature na pas été retenue..
        </p><br>
        <p>
            Croyez-bien que nous avons été sensibles à lintérêt que vous avez porté à notre projet,
            mais votre profil davantage axé sur la relation commerciale ne correspond pas à nos
            besoins actuels.
        </p><br>
        <p>
        Nous vous présentons tous nos vœux de réussite dans votre projet et espérons que vous
        trouverez très prochainement un poste relevant de vos compétences.

        </p><br>
        <p>
        Veuillez agréer, Monsieur, à nos salutations distinguées.
            </p><br>
        <p> Cordialement !</p><br>');

    $mailer->send($email);
        return $this->render('admin/gestion_dossier.html.twig', [
            'infos'=>$infos,
            'form' => $form,
        ]);
    }
}
