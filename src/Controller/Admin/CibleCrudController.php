<?php

namespace App\Controller\Admin;

use App\Entity\Cible;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CibleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cible::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
             // IdField::new('id'),
            TextField::new('firstname'),
            TextField::new('lastname'),
            DateField::new('dateNaissance'),
            TextField::new('nameCode'),
            AssociationField::new('nationality'),
            //AssociationField::new('mission')



        ];
    }

}
