<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FomulaireController extends AbstractController
{
    #[Route('/fomulaire', name: 'app_fomulaire')]
    public function index(): Response
    {
        return $this->render('fomulaire/index.html.twig', [
        ]);
    }
}
