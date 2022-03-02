<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
             // IdField::new('id'),
            TextField::new('name'),
            TextField::new('lastname'),
            DateField::new('dateNaissance'),
            TextField::new('nomCode'),
            AssociationField::new('nationality'),
            AssociationField::new('mission')
        ];
    }

}
