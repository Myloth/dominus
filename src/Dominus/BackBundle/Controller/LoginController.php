<?php

namespace Dominus\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $data = [];
        if ($lastUsername = $authenticationUtils->getLastUsername()) {
            $data['_username'] = $lastUsername;
        }

        $form = $this->get('form.factory')->createnamed('', 'login', $data, [
            'action' => $this->generateUrl('login_check'),
        ]);

        $options = [
            'form' => $form->createView(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ];

        if (null !== $targetPath = $request->get('_target_path')) {
            $options['target_path'] = urldecode($targetPath);
        }

        return $this->render('DominusBackBundle:Login:login.html.twig');
    }
}
