<?php

namespace Dominus\ModelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DominusModelBundle:Default:index.html.twig');
    }
}
