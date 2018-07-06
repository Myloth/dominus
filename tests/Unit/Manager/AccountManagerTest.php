<?php

namespace App\Tests\Unit\Manager;

use App\Entity\User\User;
use App\Form\DataHolder\CreateAccount;
use App\Manager\AccountManager;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Util\UserManipulator;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class AccountManagerTest
 */
class AccountManagerTest extends TestCase
{
    /** @var UserManipulator|\PHPUnit_Framework_MockObject_MockObject */
    private $userManipulator;

    /** @var AccountManager */
    private $accountManager;

    /**
     * Test setup
     */
    public function setUp()
    {
        $this->userManipulator = $this->createMock(UserManipulator::class);

        $this->accountManager = new AccountManager($this->userManipulator);
    }

    /**
     * Tests user creation
     */
    public function testCreateAccount()
    {
        $this->userManipulator->expects($this->any())
            ->method('create')
            ->willReturn($this->createMock(User::class));

        $accountDto = new CreateAccount();
        $accountDto->name = 'player';
        $accountDto->email = 'player@example.org';
        $accountDto->password = 'randomPassword';

        $user = $this->accountManager->createAccount($accountDto);

        $this->assertInstanceOf(UserInterface::class, $user);
    }
}
