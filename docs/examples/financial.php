<?php

require __DIR__ . '../../settings.php';
require __DIR__ . '../../vendor/autoload.php';

use Moguzz\Interest\Types\Financial;

$interestRates = (new Financial(2.99))
    ->setTotalCapital(400.00)
    ->setNumberInstallment(1);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0299
echo $interestRates->getNumberInstallment() . PHP_EOL; // 1
echo $interestRates->getValueCalculated() . PHP_EOL; // 400

$interestRates->setNumberInstallment(2);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0299
echo $interestRates->getNumberInstallment() . PHP_EOL; // 2
echo $interestRates->getValueCalculated() . PHP_EOL; // 104.50702103552

$interestRates->setInterestRates(1.99);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0199
echo $interestRates->getNumberInstallment() . PHP_EOL; // 2
echo $interestRates->getValueCalculated() . PHP_EOL; // 104.50702103552
