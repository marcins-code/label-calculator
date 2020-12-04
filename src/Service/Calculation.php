<?php


namespace App\Service;


use App\DataProvider\DataProvider;
use App\Entity\Rollers;
use Doctrine\ORM\EntityManagerInterface;

class Calculation
{
    private DataProvider $data;

    private float $circuitFactor;
    private int $minGapOnLength;

    private EntityManagerInterface $em;


    /**
     * Calculation constructor.
     * @param DataProvider $data
     * @param EntityManagerInterface $em
     */
    public function __construct(DataProvider $data, EntityManagerInterface $em)
    {
        $this->data = $data;
        $this->em = $em;
        $this->circuitFactor = $this->data->getSettingByShortName('circuitFactor') / 1000;
        $this->minGapOnLength = $this->data->getSettingByShortName('minGapOnLength');

    }

    private function calculateUFactor(int $teethNo, int $labelLength): float
    {
        return ($teethNo * ($this->circuitFactor) / ($labelLength + 2));
    }


    private function calculateLengthGap(int $teethNo, int $labelLength, int $uFActor): float
    {
        return ($teethNo * $this->circuitFactor) / $uFActor - $labelLength;
    }


    public function calculateAllDataFofAllRollers(string $length)
    {
        $rollers = $this->em->getRepository(Rollers::class)->findAll();

        foreach ($rollers as $roller) {
            $roller->setUFactor($this->calculateUFactor((int)$roller->getTeethNo(), $length));
        }

        $rollers = array_values(array_filter($rollers, function ($v) {
            return $v->getUFactor() > 0;
        }));

        foreach ($rollers as $roller) {
            $roller->setLengthGap(round($this->calculateLengthGap($roller->getTeethNo(), $length, $roller->getUFactor()), 3));
        }

        return $rollers;
    }

    public function getOnlyRollersWithCorrectLengthGaps($rollers)
    {

        return array_values(array_filter($rollers, function ($v) {
            return $v->getLengthGap() >= $this->minGapOnLength;
        }));


    }

    public function getBestSingleRoller(array $data)
    {
        return array_reduce($data, function($a, $b){
            return $a->getLengthGap() < $b->getLengthGap() ? $a : $b;
        }, array_shift($data));

    }

    public function getBestSingleRollerCircuit($teethNo)
    {
        return $this->circuitFactor*$teethNo;
    }

}