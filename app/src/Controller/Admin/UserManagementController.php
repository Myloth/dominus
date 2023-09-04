<?php

namespace App\Controller\Admin;

use App\Entity\User\AbstractUser;
use App\Entity\User\ApiUser;
use App\Entity\User\User;
use App\Form\DataHolder\User\EditApiUser;
use App\Form\Type\User\EditApiUserType;
use App\Form\Type\User\EditStandardUserType;
use App\Form\Type\User\RegisterUserType;
use App\Service\User\GroupService;
use App\Service\User\RoleService;
use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserManagementController
 */
#[Route('/admin/user', name:'admin_user_')]
class UserManagementController extends AbstractController
{
    /** @var FormFactoryInterface */
    private $formFactory;

    /** @var GroupService */
    private $groupService;

    /** @var UserService */
    private $userService;

    /**
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory, GroupService $groupService, UserService $userService)
    {
        $this->formFactory = $formFactory;
        $this->groupService = $groupService;
        $this->userService  = $userService;

    }


    #[Route('/', name:'list')]
    public function listAction(UserService $userService): Response
    {
        $listing = $userService->findAll();
        dump($listing);

        return $this->render('admin/user/list.html.twig', ['users' => $listing]);
    }

    #[Route('/new', name:'create')]
    public function create(Request $request): Response
    {
        $form = $this->formFactory->create(RegisterUserType::class, null, ['groups' => $this->groupService->getFormChoices()]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            // Register user
            $user = $this->userService->createUser($user);

            return $this->redirectToRoute('admin_user_edit', ['user' => $user->getId()]);
        }

        return $this->render('admin/user/create.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/{user}', name:'edit')]
    public function edit(AbstractUser $user,Request $request): Response
    {
        if ($user instanceof ApiUser) {
            $form = $this->formFactory->create(EditApiUserType::class, new EditApiUser());
            $template = 'admin/user/edit-api.html.twig';
        } else {
            $form = $this->formFactory->create(EditStandardUserType::class, $user);
            $template = 'admin/user/edit-user.html.twig';
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->userService->enrichUserData($user, $form->getData());

            return $this->redirectToRoute('admin_user_edit', ['user' => $user->getId()]);
        }
        dump($form->getErrors());

        return $this->render($template, ['user' => $user, 'form' => $form->createView()]);
    }

    #[Route('/user/gen-secret-key', name:'gen_secret_key', options: ['expose' => true])]
    public function generateSecretKey(): Response
    {
        return new JsonResponse(
            [
                'key' => base64_encode(mt_rand())
            ]
        );
    }

}