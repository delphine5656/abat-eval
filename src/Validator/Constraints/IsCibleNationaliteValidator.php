<?php

namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsCibleNationaliteValidator extends ConstraintValidator

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
            if($value->getPays()->getId() === $agent-> getNationality()->getId()){ //si pas égal déclenche une erreur
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{agent}}', $value->getPays())
                    ->setParameter('{{cible}}', $agent->getFirstname())
                    ->addViolation();

            }
        }
    }
}