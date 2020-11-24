<?php

namespace Moguzz\Interest\Types;

use Moguzz\Interest\Contracts\Interest;

/**
 * Class Simple
 *
 * @package Moguzz\Interest\Types
 */
final class Simple extends AbstractInterest implements Interest
{
    /**
     * Simple constructor.
     *
     * @param float $interestRates
     */
    public function __construct($interestRates = 0.00)
    {
        parent::__construct($interestRates);
    }

    /**
     * @return float|int|mixed
     */
    public function getValueCalculated()
    {
        if ($this->interestRatesIsZeroed()) {
            return $this->getTotalCapital();
        }

        return $this->getTotalCapital() + ($this->getInterestRates() * $this->getTotalCapital());
    }
}