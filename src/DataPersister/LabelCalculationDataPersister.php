<?php


namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\LabelCalculation;
use App\Service\Calculation;

class LabelCalculationDataPersister implements ContextAwareDataPersisterInterface
{


    private Calculation $calculation;

    public function __construct(Calculation $calculation)
    {
        $this->calculation = $calculation;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof LabelCalculation;
    }

    public function persist($data, array $context = [])
    {
        if ($context['collection_operation_name'] === 'post') {

            $data->data = $data->getLength();
            $data->visitors = $data->getWidth();
            $data->rollers = $this->calculation->calculateAllDataFofAllRollers($data->getLength());
            $data->rollers = $this->calculation->getOnlyRollersWithCorrectLengthGaps($data->rollers);
            $data->chosenRoller = $this->calculation->getBestSingleRoller($data->rollers);
            return [$data];
        }

    }

    public function remove($data, array $context = [])
    {
        return null;
    }

}