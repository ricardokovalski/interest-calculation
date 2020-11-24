<?php

require __DIR__ . '../../settings.php';
require __DIR__ . '../../vendor/autoload.php';

use Moguzz\Interest\Types\Simple;

$interestRates = (new Simple(0.98))
    ->setTotalCapital(227.49);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.0098
echo $interestRates->getValueCalculated() . PHP_EOL; // 229.719402

$interestRates->setInterestRates(1.30);

echo $interestRates->getInterestRates() . PHP_EOL; // 0.013
echo $interestRates->getValueCalculated() . PHP_EOL; // 230.44737
