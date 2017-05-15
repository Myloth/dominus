<?php

namespace Dominus\BackBundle\Controller\Character;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HeroController
 */
class HeroController extends Controller
{
    /**
     * Get Hero Dashboard
     *
     * @param int $userId
     *
     * @return JsonResponse
     */
    public function getHeroDashboardAction($userId)
    {
        return new JsonResponse([], 200);
    }

    /**
     * Get hero list
     *
     * @param int $userId
     *
     * @return JsonResponse
     */
    public function getHeroListAction($userId)
    {
        return new JsonResponse([], 200);
    }

    /**
     * Get hero detail
     *
     * @param int $heroId
     *
     * @return JsonResponse
     *
     * @Route('/hero/{heroId}', name="hero_detail", options={"expose": true})
     */
    public function getHeroDetailAction($heroId)
    {
        return new JsonResponse([], 200);
    }
}
