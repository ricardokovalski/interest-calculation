<?php

namespace Moguzz\Interest\Types;

use Moguzz\Interest\Contracts\Interest;

/**
 * Class Financial
 *
 * @package Moguzz\Interest\Types
 */
final class Financial extends AbstractUseInstallment implements Interest
{
    /**
     * Financial constructor.
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
        if ($this->interestRatesIsZeroed() || $this->getNumberInstallment() == 1) {
            return $this->getTotalCapital();
        }

        return $this->getTotalCapital() * $this->getInterestRates() / $this->getDivisor();
    }

    /**
     * @return float|int
     */
    private function getDivisor()
    {
        return (1 - pow(1 + $this->getInterestRates(), -$this->getNumberInstallment())) * $this->getNumberInstallment();
    }
}
