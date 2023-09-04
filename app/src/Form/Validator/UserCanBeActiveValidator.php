<?php

namespace App\Form\Validator;


use App\Entity\User\ApiUser;
use App\Entity\User\User;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class UserCanBeActiveValidator
 */
class UserCanBeActiveValidator extends ConstraintValidator
{

    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof UserCanBeActive) {
            throw new UnexpectedTypeException($constraint, UserCanBeActive::class);
        }

        if ($value instanceof ApiUser) {
            if ($value->isActive() && empty($value->getSalt())) {
                $this->context->buildViolation(UserCanBeActive::VIOLATION_MESSAGE)->addViolation();
            }
        }

        if ($value instanceof User) {
            if ($value->isActive() && (
                empty($value->getEmail()) ||
                empty($value->getPassword()) ||
                empty($value->getGroups())
                )
            ) {
                $this->context->buildViolation(UserCanBeActive::VIOLATION_MESSAGE)->addViolation();
            }
        }
    }
}
