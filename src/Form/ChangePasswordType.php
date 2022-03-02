<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'disabled'=> true,
                'label' => 'Mon prénom'
            ])
            ->add('lastname', TextType::class, [
                'disabled'=> true,
                'label' => 'Mon nom'
            ])
            ->add('email', EmailType::class, [
                'disabled'=> true,
                'label' => 'Mon adresse e-mail'
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Mon mot de passe',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'veuillez saisir vot mot mot de passe actuelle'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'le mot de passe doit être identique au mot de passe confirmé',
                'label' => 'Mon nouveau mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'mon nouveau mot de passe'],
                'second_options' => ['label' => 'confirmez votre nouveau mot de passe']

            ])
            ->add('submit', SubmitType::class, [
                'label'  => 'valider votre nouveau mot de passe',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
