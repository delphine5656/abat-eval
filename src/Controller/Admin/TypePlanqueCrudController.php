<?php

namespace App\Controller\Admin;

use App\Entity\TypePlanque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypePlanqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypePlanque::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
