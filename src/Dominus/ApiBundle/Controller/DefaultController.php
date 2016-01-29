<?php

namespace Dominus\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DominusApiBundle:Default:index.html.twig');
    }
}
