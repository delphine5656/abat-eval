<?php

namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsPlanquePaysValidator extends ConstraintValidator
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

        foreach ( $value ->getPlanque() as $planque){
            if($value->getPays()->getId() !== $planque-> getPays()->getId()){ //si pas égal déclenche une erreur
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{pays}}', $value->getPays())
                    ->setParameter('{{planque}}', $planque->getName())
                    ->addViolation();

            }
        }
    }
}