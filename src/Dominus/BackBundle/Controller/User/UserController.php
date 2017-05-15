<?php

namespace Dominus\BackBundle\Controller\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * User list
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/users", name="user_list")
     * @Method("GET")
     */
    public function listAction(Request $request)
    {

    }

    /**
     * User minimal page
     *
     * @param int     $id
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/users/{id}", name="user_edit")
     *
     * @Method({"POST", "GET"})
     */
    public function editAction($id, Request $request)
    {

    }

    /**
     * Manual user creation
     *
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/users/create", name="user_create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request)
    {

    }
}
