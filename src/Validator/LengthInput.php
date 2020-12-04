<?php


namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
class LengthInput extends Constraint
{
    public string $message = "Długość etykiety musi się zawierać pomiędzy %min i %max mm";
}