<?php

require __DIR__ . '../../settings.php';
require __DIR__ . '../../vendor/autoload.php';

use Moguzz\Interest\Types\Compound;

$interestRates = (new Compound(3.69))
    ->setTotalCapital(750.98)
    ->setNumberInstallment(1);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0369
echo $interestRates->getNumberInstallment() . PHP_EOL; // 1
echo $interestRates->getValueCalculated() . PHP_EOL; // 750.98

$interestRates->setNumberInstallment(2);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0369
echo $interestRates->getNumberInstallment() . PHP_EOL; // 2
echo $interestRates->getValueCalculated() . PHP_EOL; // 778.691162

$interestRates->setInterestRates(1.99);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0199
echo $interestRates->getNumberInstallment() . PHP_EOL; // 2
echo $interestRates->getValueCalculated() . PHP_EOL; // 765.924502
