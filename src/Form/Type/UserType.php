<?php

namespace App\Form\Type;

use App\Entity\UserEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname', TextType::class, ['empty_data' => ''])
                ->add('lastname', TextType::class, ['empty_data' => ''])
                ->add('email', EmailType::class, ['empty_data' => ''])
                ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => UserEntity::class,
                'csrf_protection' => true
            ]
        );
    }
}