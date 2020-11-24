<?php

namespace Moguzz\Interest\Types;

use Moguzz\Interest\Contracts\Interest;

/**
 * Class Compound
 *
 * @package Moguzz\Interest\Types
 */
final class Compound extends AbstractUseInstallment implements Interest
{
    /**
     * Compound constructor.
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

        return $this->getTotalCapital() * pow((1 + $this->getInterestRates()), $this->getNumberInstallment() - 1);
    }
}
