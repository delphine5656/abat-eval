<?php

namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsContactNationalityValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint): void {
        /**
         * @var $constraint
         */
        $value=$this->context->getRoot()->getData();

        foreach ( $value ->getContact() as $contact){
             if($value->getPays()->getId() !== $contact-> getNationality()->getId()){ //si pas égal déclenche une erreur
             $this->context->buildViolation($constraint->message)
              ->setParameter('{{pays}}', $value->getPays())
             ->setParameter('{{contact}}', $contact->getName())
                 ->addViolation();

        }
    }
    }

}