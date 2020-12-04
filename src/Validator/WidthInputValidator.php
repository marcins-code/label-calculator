<?php


namespace App\Validator;


use App\DataProvider\DataProvider;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class WidthInputValidator extends ConstraintValidator
{

    private DataProvider $dataProvider;

    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function validate($value, Constraint $constraint)
    {
        $minWidth = $this->dataProvider->getSettingByShortName('minLabelWidth');
        $maxWidth = $this->dataProvider->getSettingByShortName('maxLabelWidth');

        if(!is_integer($value)) {
            $this->context->buildViolation('Proszę podać liczby')
                ->addViolation();
        }

        if ($value > $maxWidth || $value < $minWidth) {
            $this->context->buildViolation($constraint->message)
                ->setParameters(['%min' => $minWidth, '%max' => $maxWidth])
                ->addViolation();
        }
    }
}