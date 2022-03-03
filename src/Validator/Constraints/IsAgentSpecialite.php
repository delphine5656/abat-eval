<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */

class IsAgentSpecialite extends Constraint

{
    //on définit le message d'erreur retournée si le formulaire n'est pas valide
    public string $message = "L'agent doit avoir au moins une spécialité commune avec la spécialité de la mission - {{ string }}";

    /**
     * @return string
     */
    public function validatedBy(): string
    {
        //fonction pour récupérer notre contrainte
        return get_class($this).'Validator';
    }

}