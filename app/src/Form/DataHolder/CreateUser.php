<?php

namespace App\Form\DataHolder;

/**
 * DTO CreateUser
 */
class CreateUser
{
    public const USER_TYPE_API = 'API';
    public const USER_TYPE_USER = 'USER';

    /** @var string */
    public $username;

    /** @var string */
    public $email;

    /** @var array */
    public $groups;

    /** @var string */
    public $userType;

}