<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsAgentSpecialiteValidator extends ConstraintValidator
{
    /**
     * @param mixed $value
     * @param Constraint $constraint
     */

    public function validate($value, Constraint $constraint): void {
        /**
         * @var $constraint
         */

        //permet d'avoir accès à toutes nos entity
        $value=$this->context->getRoot()->getData();

        foreach ( $value ->getAgent() as $agent){
            if($value->getSpeciality()->getId() === $agent-> getSpeciality()){ //si pas égal déclenche une erreur
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{agent}}', $value->getSpeciality())
                    ->setParameter('{{speciality}}', $agent->getFirstname())
                    ->addViolation();

            }
        }
    }
}