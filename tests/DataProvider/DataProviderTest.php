<?php


namespace App\Tests\DataProvider;


use App\DataProvider\DataProvider;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class DataProviderTest extends KernelTestCase
{

    private EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
    }


    public function testNumberOfRollersInDatabase()
    {

        $rollers = new DataProvider($this->entityManager);
        $cont = $rollers->getAllRollers();
        $this->assertSame(25, count($cont));

    }

    public function testSingleSettingValue()
    {
        $setting = new DataProvider($this->entityManager);
        $singleSettingValue = $setting->getSettingByShortName('circuitFactor');
        $singleSettingValue2 = $setting->getSettingByShortName('minLabelWidth');

        $this->assertSame(3175, $singleSettingValue);
        $this->assertSame(15, $singleSettingValue2);
    }


}