<?php

require __DIR__ . '../vendor/autoload.php';

use RicardoKovalski\InterestCalculation\Types\Compound;

$interestRates = new Compound(3.69);
$interestRates->appendTotalCapital(750.98);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0369
echo $interestRates->getValueCalculatedByInstallment(1) . PHP_EOL; // 750.98

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0369
echo $interestRates->getValueCalculatedByInstallment(2) . PHP_EOL; // 778.691162

$interestRates->resetInterestValue(1.99);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0199
echo $interestRates->getValueCalculatedByInstallment(2) . PHP_EOL; // 765.924502
