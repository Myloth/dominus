<?php

namespace App\Form\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * Class UserCanBeActive
 *
 * @Annotation
 */
class UserCanBeActive extends Constraint
{
    public const VIOLATION_MESSAGE = "User cannot be activated due to missing properties";
}
