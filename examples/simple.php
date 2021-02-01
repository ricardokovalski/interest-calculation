<?php

require __DIR__ . '../vendor/autoload.php';

use RicardoKovalski\InterestCalculation\Types\Simple;

$interestRates = new Simple(0.98);
$interestRates->appendTotalCapital(227.49);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0098
echo $interestRates->getValueCalculatedByInstallment(1) . PHP_EOL; // 229.719402

$interestRates->resetInterestValue(1.30);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.013
echo $interestRates->getValueCalculatedByInstallment(1) . PHP_EOL; // 230.44737
