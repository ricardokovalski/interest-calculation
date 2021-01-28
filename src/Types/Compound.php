<?php

namespace RicardoKovalski\InterestCalculation\Types;

use RicardoKovalski\InterestCalculation\Contracts\Interest;

/**
 * Class Compound
 *
 * @package RicardoKovalski\InterestCalculation\Types
 */
final class Compound extends CompositeInterest implements Interest
{
    /**
     * Compound constructor.
     *
     * @param float $interestValue
     */
    public function __construct($interestValue = 0.00)
    {
        parent::__construct($interestValue);
    }

    /**
     * @param $numberInstallment
     * @return float|int
     */
    public function getValueCalculatedByInstallment($numberInstallment)
    {
        if ($this->interestValueIsZeroed()) {
            return $this->getTotalCapital();
        }

        return $this->getTotalCapital() * pow((1 + $this->getInterestRates()), $numberInstallment - 1);
    }
}
