<?php

namespace App\Controller\Api\Guild;

use App\Form\DataHolder\Guild\GuildEdit;
use App\Entity\Domain\Guild;
use Nelmio\ApiDocBundle\Annotation\Security;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class GuildController
 * @Route("/guild")
 */
class GuildController extends Controller
{
    /**
     * Creates a guild for a given player
     *
     * @Route("/create")
     *
     * @Method({"POST"})
     *
     * @SWG\Tag(name="Guilds")
     * @SWG\Parameter(
     *     name="form",
     *     in="formData",
     *     description="Guild edition data",
     *     @Model(type=GuildEdit::class)
     * )
     * @SWG\Response(
     *     response="200",
     *     description="The created guild",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Items(ref=@Model(type=Guild::class))
     *     )
     * )
     * 
     */
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
