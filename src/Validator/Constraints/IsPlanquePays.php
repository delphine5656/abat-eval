<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */

class IsPlanquePays extends Constraint
{
    //on définit le message d'erreur retournée si le formulaire n'est pas valide
    public string $message = "La planque doit se situer dans le même pays que la mission - {{ string }}";

    /**
     * @return string
     */
    public function validatedBy(): string
    {
        //fonction pour récupérer notre contrainte
        return get_class($this).'Validator';
    }
}