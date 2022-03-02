<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AgentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agent::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('firstname'),
            TextField::new('lastname'),
            DateField::new('dateNaissance'),
            IntegerField::new('codeAuthentification'),
            AssociationField::new('speciality'),
            AssociationField::new('nationality'),
            AssociationField::new('mission'),

        ];
    }

}
