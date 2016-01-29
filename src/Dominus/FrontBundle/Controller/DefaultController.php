<?php

namespace Dominus\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DominusFrontBundle:Default:index.html.twig');
    }
}
