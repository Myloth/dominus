<?php

namespace App\Controller;

use App\Form\Type\CreateAccountType;
use App\Manager\AccountManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AccountController
 * @Route("/account")
 */
class AccountController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/create")
     */
    public function createAccount(Request $request) : Response
    {
        /** @var FormInterface $form */
        $form = $this->get('form.factory')->createNamed('', CreateAccountType::class);
        $form->handleRequest($request);

        if (!$form->isValid()) {
            $errors = $form->getErrors();

            return new Response($errors, Response::HTTP_BAD_REQUEST);
        }

        $this->get(AccountManager::class)->createAccount($form->getData());

        return new Response([], Response::HTTP_CREATED);
    }
}
