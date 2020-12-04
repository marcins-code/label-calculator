<?php


namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
class WidthInput extends Constraint
{
    public string $message = "Szerokość  etykiety musi się zawierać pomiędzy %min i %max mm";
}