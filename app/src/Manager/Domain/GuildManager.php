<?php

namespace App\Manager\Domain;

use App\Entity\Domain\Guild;
use App\Entity\Domain\GuildRoom;
use App\Entity\Domain\GuildTemplate;
use App\Form\DataHolder\Guild\GuildEdit;
use App\Service\Domain\GuildService;
use App\Service\Domain\GuildTemplateService;
use Doctrine\ORM\ORMException;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class GuildManager
 */
class GuildManager
{
    /** @var GuildService */
    private $guildService;

    /** @var GuildTemplateService */
    private $guildTemplateService;

    /**
     * @param GuildService         $guildService
     * @param GuildTemplateService $guildTemplateService
     */
    public function __construct(GuildService $guildService, GuildTemplateService $guildTemplateService)
    {
        $this->guildService = $guildService;
        $this->guildTemplateService = $guildTemplateService;
    }

    /**
     * @param UserInterface $user
     * @param int           $level
     *
     * @throws ORMException
     *
     * @return Guild
     */
    public function createFromTemplate(UserInterface $user, GuildEdit $guildEdit, int $level) : Guild
    {
        $guild = new Guild();
        $guild->setUser($user);
        $guild->setName($guildEdit->name);
        $guild->setDescription($guildEdit->description);
        $guild->setLevel($level);

        $templateParts = $this->guildTemplateService->findBy(["level" => $level]);

        /** @var GuildTemplate $part */
        foreach ($templateParts as $part) {
            $guildRoom = (new GuildRoom())
                ->setGuild($guild)
                ->setRoom($part->getRoom())
                ->setLevel($part->getRoomLevel())
                ->setPosition($part->getRoomPosition())
            ;

            $guild->addRoom($guildRoom);
        }

        $this->guildService->save($guild);

        return $guild;
    }
}
