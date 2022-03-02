<?php

namespace App\Controller\Admin;

use App\Entity\Planque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlanqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Planque::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('name'),
            IntegerField::new('code'),
            TextField::new('adresse'),
            AssociationField::new('pays'),
            AssociationField::new('type'),
        ];
    }

}
