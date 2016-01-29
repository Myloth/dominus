<?php

namespace Dominus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DominusBackBundle:Default:index.html.twig');
    }
}
