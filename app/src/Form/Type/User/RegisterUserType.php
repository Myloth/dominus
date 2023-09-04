<?php

namespace App\Form\Type\User;

use App\Entity\User\AbstractUser;
use App\Form\DataHolder\User\CreateUser;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegisterUserType
 */
class RegisterUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['required' => true, 'label' => 'form.label.username'])
            ->add('userType', ChoiceType::class, ['required' => true, 'choices' => $options['types'], 'label' => 'form.label.userType'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => CreateUser::class,
                'groups' => [],
                'types' => [
                    AbstractUser::USER_TYPE_API => AbstractUser::USER_TYPE_API,
                    AbstractUser::USER_TYPE_USER => AbstractUser::USER_TYPE_USER,
                ],
                'translation_domain' => 'users'
            ]
        );
    }
}