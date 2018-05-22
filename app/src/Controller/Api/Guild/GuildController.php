<?php

namespace App\Controller\Api\Guild;

use App\Form\DataHolder\Guild\GuildEdit;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GuildController
{
    public function createAction(Request $request)
    {
        /** @var FormInterface $form */
        $form = $this->get('form.factory')->createNamed('', GuildEdit::class);
        $form->handleRequest($request);

        if (!$form->isValid()) {
            $errors = $form->getErrors();

            return new Response($errors, Response::HTTP_BAD_REQUEST);
        }
    }
}
