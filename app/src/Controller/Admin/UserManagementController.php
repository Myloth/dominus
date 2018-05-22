<?php

namespace App\Controller\Admin;

use App\Entity\User\User;
use App\Form\Type\RegisterUserType;
use App\Service\User\GroupService;
use App\Service\User\RoleService;
use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
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

    /** @var RoleService */
    private $roleService;

    /**
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory, GroupService $groupService, RoleService $roleService)
    {
        $this->formFactory = $formFactory;
        $this->groupService = $groupService;
        $this->roleService = $roleService;

    }


    #[Route('/', name:'list')]
    public function listAction(UserService $userService): Response
    {
        $listing = $userService->findAll();

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

            return $this->forward('UserManagementController::edit', ['user' => $user->getId()]);
        }

        return $this->render('admin/user/create.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/{user}', name:'edit')]
    public function edit(User $user): Response
    {
        $form = $this->formFactory->create(RegisterUserType::class, $user, ['roles' => $this->roleService->getFormChoices()]);
    }
}