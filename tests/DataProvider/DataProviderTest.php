<?php


namespace App\Tests\DataProvider;


use App\DataProvider\DataProvider;
use App\Service\Calculation;
use PHPUnit\Framework\TestCase;

class DataProviderTest extends TestCase
{

    public function testShouldReturnOnlyOneValueFromArray()
        {
            //Given
            $array = [
                ['minWidth',20],
                ['maxWidth',100],
                ['minHeight',70],
                ['maxHeight',150],
            ];

            $dataProvider = new DataProvider();

            $dataProvider->getSettingByShortName('maxWidth');

            $this->assertSame( ['minWidth',20],  $dataProvider->getSettingByShortName('maxWidth'));
        }

}