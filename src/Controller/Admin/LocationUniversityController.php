<?php

namespace App\Controller\Admin;

use App\Entity\LocationUniversity;
use App\Form\LocationUniversityType;
use App\Repository\LocationUniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/location/university')]
class LocationUniversityController extends AbstractController
{
    #[Route('/', name: 'app_location_university_index', methods: ['GET'])]
    public function index(LocationUniversityRepository $locationUniversityRepository): Response
    {
        return $this->render('admin/location_university/index.html.twig', [
            'location_universities' => $locationUniversityRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_location_university_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LocationUniversityRepository $locationUniversityRepository): Response
    {
        $locationUniversity = new LocationUniversity();
        $form = $this->createForm(LocationUniversityType::class, $locationUniversity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locationUniversityRepository->add($locationUniversity, true);

            return $this->redirectToRoute('app_location_university_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/location_university/new.html.twig', [
            'location_university' => $locationUniversity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_location_university_show', methods: ['GET'])]
    public function show(LocationUniversity $locationUniversity): Response
    {
        return $this->render('admin/location_university/show.html.twig', [
            'location_university' => $locationUniversity,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_location_university_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LocationUniversity $locationUniversity, LocationUniversityRepository $locationUniversityRepository): Response
    {
        $form = $this->createForm(LocationUniversityType::class, $locationUniversity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locationUniversityRepository->add($locationUniversity, true);

            return $this->redirectToRoute('app_location_university_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/location_university/edit.html.twig', [
            'location_university' => $locationUniversity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_location_university_delete', methods: ['POST'])]
    public function delete(Request $request, LocationUniversity $locationUniversity, LocationUniversityRepository $locationUniversityRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$locationUniversity->getId(), $request->request->get('_token'))) {
            $locationUniversityRepository->remove($locationUniversity, true);
        }

        return $this->redirectToRoute('app_location_university_index', [], Response::HTTP_SEE_OTHER);
    }
}
