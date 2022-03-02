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
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',  TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
                'attr' => [
                    'placeholder'=> 'saisissez votre prénom'
                ]
            ])
            ->add('lastname', TextType::class , [
                'label' => 'Votre nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 80
                ]),
                'attr' => [
                    'placeholder'=> 'saisissez votre nom'
                ]
            ])

            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'attr' => [
                    'placeholder'=> 'saisissez votre email'
                ]
            ])
            //->add('roles')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'le mot de passe doit être identique au mot de passe confirmé',
                'label' => 'Votre mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'mot de passe'],
                'second_options' => ['label' => 'confirmez votre mot de passe']

            ])

            ->add('submit', SubmitType::class, [
                'label'  => 's\'inscrire',
                'attr' => [
                    'class' => 'button'
                ]
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
