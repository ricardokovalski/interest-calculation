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

    /**
     * @param $numberInstallments
     * @return float|int
     */
    public function getReverseInterestByNumberInstallments($numberInstallments)
    {
        if ($this->interestValueIsZeroed() || $numberInstallments == 1) {
            return 0.00;
        }

        $totalInterest = pow(1 + $this->getInterestRates(), $numberInstallments - 1);
        $totalInterest = ($totalInterest - 1) * 100;
        return $this->getTotalCapital() - ($this->getTotalCapital() * 100 / (100 + $totalInterest));
    }
}
