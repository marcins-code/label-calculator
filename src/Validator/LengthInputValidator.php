<?php


namespace App\Validator;


use App\DataProvider\DataProvider;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class LengthInputValidator extends ConstraintValidator
{

    private DataProvider $dataProvider;

    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function validate($value, Constraint $constraint)
    {
        $minLength = $this->dataProvider->getSettingByShortName('minLabelLength');
        $maxLength = $this->dataProvider->getSettingByShortName('maxLabelLength');


        if ($value > $maxLength || $value < $minLength) {
            $this->context->buildViolation($constraint->message)
                ->setParameters(['%min' => $minLength, '%max' => $maxLength])
                ->addViolation();
        }
    }
}