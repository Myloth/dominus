<?php

namespace App\Form\Type\User;

use App\Entity\User\ApiUser;
use App\Form\DataHolder\User\EditApiUser;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EditApiUserType
 */
class EditApiUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salt', TextType::class, ['required' => true, 'label' => 'form.label.salt', 'attr' => ['readonly' => true]])
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
                'data_class' => EditApiUser::class,
                'translation_domain' => 'users'
            ]
        );
    }
}
