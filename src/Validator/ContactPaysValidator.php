<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Validator\ContactPays;
class ContactPaysValidator extends  ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
       /* /**
         * @var $constraint
         */
        // $value=$this->context->getRoot()->getData();

        // foreach ( $value ->getContact() as $contact){
            // if($value->getPays()->getId() !== $contact-> getNationality()->getId()){ //si pas égal déclenche une erreur
                // $this->context->buildViolation($constraint->message)
               //  ->setParameter('{{pays}}', $value->getPays())
                    // ->setParameter('{{contact}}', $contact->getName())
                   //  ->addViolation();

             }
       //  }


  //  }

}