<?php

namespace App\Form\Type;

use App\Entity\User\User;
use App\Form\DataHolder\CreateUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
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
            ->add('email', EmailType::class, ['required' => true, 'label' => 'form.label.email'])
            ->add(
                'groups',
                ChoiceType::class,
                [
                    'label' => 'form.label.groups',
                    'required' => true,
                    'multiple' => true,
                    'choices' => array_flip($options['groups']),
                    'attr' => [
                        'class' => 'select2'
                    ],
                ]
            )
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
                    CreateUser::USER_TYPE_API => CreateUser::USER_TYPE_API,
                    CreateUser::USER_TYPE_USER => CreateUser::USER_TYPE_USER,
                ],
                'translation_domain' => 'users'
            ]
        );
    }
}