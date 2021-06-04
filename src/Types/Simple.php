<?php

namespace RicardoKovalski\InterestCalculation\Types;

use RicardoKovalski\InterestCalculation\Contracts\Interest;

/**
 * Class Simple
 *
 * @package RicardoKovalski\InterestCalculation\Types
 */
final class Simple extends CompositeInterest implements Interest
{
    /**
     * Simple constructor.
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
        if ($this->interestValueIsZeroed() || $numberInstallment == 1) {
            return $this->getTotalCapital();
        }

        return $this->getTotalCapital() + ($this->getInterestRates() * $this->getTotalCapital());
    }

    /**
     * @param $numberInstallments
     * @return float|int
     */
    public function getReverseInterestByNumberInstallments($numberInstallments)
    {
        if ($this->interestValueIsZeroed() || $numberInstallments == 1) {
            return 0.00;
        }

        $interestTotal = $this->getTotalCapital() - ($this->getTotalCapital() * $this->getInterestRates());
        return $this->getTotalCapital() - $interestTotal;
    }
}
