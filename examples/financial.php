<?php

require __DIR__ . '../vendor/autoload.php';

use RicardoKovalski\InterestCalculation\Types\Financial;

$interestRates = new Financial(2.99);
$interestRates->appendTotalCapital(400.00);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0299
echo $interestRates->getValueCalculatedByInstallment(1) . PHP_EOL; // 400

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0299
echo $interestRates->getValueCalculatedByInstallment(2) . PHP_EOL; // 104.50702103552

$interestRates->resetInterestValue(1.99);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0199
echo $interestRates->getValueCalculatedByInstallment(2) . PHP_EOL; // 104.50702103552
