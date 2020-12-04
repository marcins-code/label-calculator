<?php


namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Rollers;

class DailyStatisticsProvider implements RestrictedDataProviderInterface, ContextAwareCollectionDataProviderInterface
{

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Rollers::class;
    }

    /**
     * @param string $resourceClass
     * @param string|null $operationName
     * @param array $context
     * @return iterable
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
//        if (($context['collection_operation_name'] ?? null) === 'get') {


//            $stats = new LabelCalculation();
//            $stats->visitors = 400;
//            $stats->data = 500;
//            $stats->rollers = ['dupa'];
//            $stats->chosenRoller = new Rollers();
//            $stats->

//            return [$stats];
//        }

    }
}