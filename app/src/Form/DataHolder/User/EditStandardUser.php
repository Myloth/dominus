<?php

namespace App\Form\DataHolder\User;

/**
 * Class EditStandardUser
 */
class EditStandardUser extends CreateUser
{
    /** @var string */
    public $email;

    /** @var array */
    public $groups;
}