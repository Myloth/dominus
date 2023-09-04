<?php

namespace App\Form\Type\User;

use App\Entity\User\Group;
use App\Entity\User\User;
use App\Form\DataHolder\User\EditStandardUser;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EditStandardUserType
 */
class EditStandardUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', PasswordType::class, ['required' =>  false, 'label' => 'form.label.password'])
            ->add('email', EmailType::class, ['required' => true, 'label' => 'form.label.email'])
            ->add(
                'groups',
                EntityType::class,
                [
                    'class' => Group::class,
                    'label' => 'form.label.groups',
                    'required' => true,
                    'multiple' => true,
                    'attr' => [
                        'class' => 'select2'
                    ],
                ]
            )
            ->add('active', CheckboxType::class, ['required' =>  false, 'label' => 'form.label.active'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(
            [
                'data_class' => User::class,
                'translation_domain' => 'users'
            ]
        );
    }
}
