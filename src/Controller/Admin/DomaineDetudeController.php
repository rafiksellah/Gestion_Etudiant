<?php

namespace App\Controller\Admin;

use App\Entity\DomaineDetude;
use App\Form\DomaineDetudeType;
use App\Repository\DomaineDetudeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/domaine/detude')]
class DomaineDetudeController extends AbstractController
{
    #[Route('/', name: 'app_domaine_detude_index', methods: ['GET'])]
    public function index(DomaineDetudeRepository $domaineDetudeRepository): Response
    {
        return $this->render('admin/domaine_detude/index.html.twig', [
            'domaine_detudes' => $domaineDetudeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_domaine_detude_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DomaineDetudeRepository $domaineDetudeRepository): Response
    {
        $domaineDetude = new DomaineDetude();
        $form = $this->createForm(DomaineDetudeType::class, $domaineDetude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $domaineDetudeRepository->add($domaineDetude, true);

            return $this->redirectToRoute('app_domaine_detude_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/domaine_detude/new.html.twig', [
            'domaine_detude' => $domaineDetude,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_domaine_detude_show', methods: ['GET'])]
    public function show(DomaineDetude $domaineDetude): Response
    {
        return $this->render('admin/domaine_detude/show.html.twig', [
            'domaine_detude' => $domaineDetude,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_domaine_detude_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DomaineDetude $domaineDetude, DomaineDetudeRepository $domaineDetudeRepository): Response
    {
        $form = $this->createForm(DomaineDetudeType::class, $domaineDetude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $domaineDetudeRepository->add($domaineDetude, true);

            return $this->redirectToRoute('app_domaine_detude_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/domaine_detude/edit.html.twig', [
            'domaine_detude' => $domaineDetude,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_domaine_detude_delete', methods: ['POST'])]
    public function delete(Request $request, DomaineDetude $domaineDetude, DomaineDetudeRepository $domaineDetudeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$domaineDetude->getId(), $request->request->get('_token'))) {
            $domaineDetudeRepository->remove($domaineDetude, true);
        }

        return $this->redirectToRoute('app_domaine_detude_index', [], Response::HTTP_SEE_OTHER);
    }
}
