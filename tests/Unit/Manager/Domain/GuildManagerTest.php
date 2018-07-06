<?php

namespace App\Tests\Unit\Manager\Domain;

use App\Entity\Domain\GuildTemplate;
use App\Entity\Domain\Room;
use App\Entity\User\User;
use App\Form\DataHolder\Guild\GuildEdit;
use App\Manager\Domain\GuildManager;
use App\Service\Domain\GuildService;
use App\Service\Domain\GuildTemplateService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class GuildManagerTest
 */
class GuildManagerTest extends TestCase
{
    /** @var GuildTemplateService|\PHPUnit_Framework_MockObject_MockObject */
    private $guildTemplateService;

    /** @var GuildService|\PHPUnit_Framework_MockObject_MockObject */
    private $guildService;

    /** @var GuildManager */
    private $guildManager;

    /**
     * Tests setup
     */
    public function setUp()
    {
        $this->guildTemplateService = $this->createMock(GuildTemplateService::class);
        $this->guildService = $this->createMock(GuildService::class);

        $this->guildManager = new GuildManager($this->guildService, $this->guildTemplateService);
    }

    /**
     * Test createFromTemplate method - new player
     */
    public function testCreateNewFromTemplate()
    {
        $guildEdit = new GuildEdit();
        $guildEdit->description = 'random description';
        $guildEdit->name = "RandGuild";

        $user = new User();

        $this->guildTemplateService->expects($this->any())
            ->method('findBy')
            ->willReturn($this->buildTemplateParts());

        $guild = $this->guildManager->createFromTemplate($user, $guildEdit, GuildTemplate::NEW_PLAYER);

        $this->assertSame('random description', $guild->getDescription());
        $this->assertSame('RandGuild', $guild->getName());
        $this->assertCount(2, $guild->getRooms());
    }

    /**
     * Build template parts
     *
     * @return GuildTemplate[]
     */
    private function buildTemplateParts()
    {
        $hall = (new Room())
            ->setName('Hall')
            ->setDescription('Hall de guilde')
            ->setMaxBuilding(1)
            ->setMaxLevel(1);

        $dormitory = (new Room())
            ->setName('dormitory')
            ->setDescription('Where adventurers sleep')
            ->setMaxBuilding(1)
            ->setMaxLevel(5);

        $hallPart = (new GuildTemplate())
            ->setRoom($hall)
            ->setRoomLevel(1)
            ->setRoomPosition(1);

        $dormitoryPart = (new GuildTemplate())
            ->setRoom($dormitory)
            ->setRoomLevel(1)
            ->setRoomPosition(2);

        return [$hallPart, $dormitoryPart];
    }
}
