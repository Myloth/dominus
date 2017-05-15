<?php

namespace Dominus\BackBundle\Controller\Domain;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GuildController
 */
class GuildController extends Controller
{
    /**
     * Guild Dashboard
     *
     * @param int $userId
     *
     * @return JsonResponse
     */
    public function getGuildDashboardAction(int $userId)
    {

        return new JsonResponse([], 200);
    }

    /**
     * Gets guild customization tab
     *
     * @param int $userId
     *
     * @return JsonResponse
     */
    public function getGuildCustomisationInfos(int $userId)
    {

        return new JsonResponse();
    }

    /**
     * Guild room disposition
     *
     * @param $userId
     *
     * @return JsonResponse
     */
    public function getRoomsAction(int $userId)
    {
        return new JsonResponse([], 200);
    }
}
