<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

    /**
     * @Annotation
     */


class IsContactNationality extends Constraint
{
    //on définit le message d'erreur retournée si le formulaire n'est pas valide
    public string $message = "Vous devez choisir un contact du pays de la mission - {{ string }}";

    /**
     * @return string
     */
    public function validatedBy(): string
    {
        //fonction pour récupérer notre contrainte
        return get_class($this).'Validator';
    }

}
