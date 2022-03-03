<?php

namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */

class IsCibleNationalite extends Constraint
{
    //on définit le message d'erreur retournée si le formulaire n'est pas valide
    public string $message = "La nationalité de la cible doit être différente de la nationalité de l'agent - {{ string }}";

    /**
     * @return string
     */
    public function validatedBy(): string
    {
        //fonction pour récupérer notre contrainte
        return get_class($this).'Validator';
    }
}