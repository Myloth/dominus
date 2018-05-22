<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 */
#[Route('/admin', name:'admin_')]
class IndexController extends AbstractController
{
    #[Route('/', name:'index')]
    public function index(): Response
    {
        return $this->render('admin/index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}