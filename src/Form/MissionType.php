<?php

namespace App\Form;

use App\Entity\Agent;
use App\Entity\Category;
use App\Entity\Cible;
use App\Entity\Contact;
use App\Entity\Mission;
use App\Entity\Pays;
use App\Entity\Speciality;
use App\Validator\ContactPays;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCode')
            ->add('titre',TextType::class, [
                'label' => 'Titre',
                'constraints' =>[
                    new NotBlank(['message' => 'ne peut pas être vide']),
                    new Length(['min'=>4])
                ] ,
                'attr' => [
                    'placeholder'=> 'saisissez titre'
                ]
            ])
            ->add('description',TextareaType::class, [
        'label' => 'Description',
        'attr' => ['placeholder' => 'taper la description de la mission',
            'class' => 'form-control text-dark m-2'
        ]
    ])
            ->add('slug')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('category')
            ->add('statut')
            ->add('planque')
            ->add('speciality')
            ->add('pays', EntityType::class, [
                'class' => Pays::class,
                'constraints' => [
                    new ContactPays(),
                ]
            ])
            ->add('agent', EntityType::class, [
                'label' => 'les agents',
                'placeholder' => 'choisir les agents',
                'class' => Agent::class,
                'choice_label'=> function($agent){
                return $agent->getFirstname().'('.$agent->getNationality().')';
                },
                'mapped' => false
            ])
            ->add('contact', EntityType::class, [
                'label' => 'les contacts',
                'placeholder' => 'choisir les contacts',
                'class' => Contact::class,
                'choice_label'=> function($contact){
                    return $contact->getName().'('.$contact->getNationality().')';
                },
                'mapped' => false
            ])
            ->add('cible',EntityType::class, [
        'label' => 'les agents',
        'placeholder' => 'choisir les cibles',
        'class' => Cible::class,
                'choice_label'=> function($cible){
                    return $cible->getFirstname().'('.$cible->getNationality().')';
                },
                'mapped' => false
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
