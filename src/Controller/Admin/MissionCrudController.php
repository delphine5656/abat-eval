<?php

namespace App\Controller\Admin;

use App\Entity\Mission;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MissionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mission::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('titre'),
            TextField::new('nomCode'),
            SlugField::new('slug')->setTargetFieldName('titre'),
            TextareaField::new('description'),
            DateField::new('dateDebut'),
            DateField::new('dateFin'),
            AssociationField::new('category'),
            AssociationField::new('agent'),
            AssociationField::new('contact'),
            AssociationField::new('cible'),
            AssociationField::new('statut'),
            AssociationField::new('planque'),
            AssociationField::new('speciality'),
            AssociationField::new('pays'),
        ];
    }

}
