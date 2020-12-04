<?php


namespace App\DataPersister;


use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\DataProvider\DataProvider;
use App\Entity\LabelCalculation;
use App\Service\Calculation;

class LabelCalculationDataPersister implements ContextAwareDataPersisterInterface
{


    private Calculation $calculation;
    private DataProvider $dataProvider;

    public function __construct(Calculation $calculation, DataProvider $dataProvider)
    {
        $this->calculation = $calculation;
        $this->dataProvider = $dataProvider;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof LabelCalculation;
    }

    public function persist($data, array $context = []): array
    {
        if ($context['collection_operation_name'] === 'post') {

            $minGapOnWidth = $this->dataProvider->getSettingByShortName('minGapOnWidth');
            $formatWidth = $this->dataProvider->getSettingByShortName('formatWidth');
            $formatLength = $this->dataProvider->getSettingByShortName('formatLength');
            $circuitFactor = $this->dataProvider->getSettingByShortName('circuitFactor');

            $data->identifier = $data->getLength();
            $data->rollers = $this->calculation->calculateAllDataFofAllRollers($data->getLength());
            $data->rollers = $this->calculation->getOnlyRollersWithCorrectLengthGaps($data->rollers);
            $data->chosenRoller = $this->calculation->getBestSingleRoller($data->rollers);

            $data->qtyOfLabelsOnFormatOnWidth = floor($formatWidth / ($data->getWidth() + $minGapOnWidth));
            $data->qtyOfLabelsOnFormatOnLength = floor($formatLength / ($data->getLength() + $data->getChosenRollerCalculatedGap()));
            $data->qtyOfLabelsOnFormatOnLengthPunch = floor((($data->getChosenRollerTeethNo()*$circuitFactor)/1000)/($data->getLength()+2));
            $data->totalNumberOfLabels = $data->qtyOfLabelsOnFormatOnLength *$data->qtyOfLabelsOnFormatOnWidth;

            return [$data];
        }

    }

    public function remove($data, array $context = [])
    {
        return null;
    }

}