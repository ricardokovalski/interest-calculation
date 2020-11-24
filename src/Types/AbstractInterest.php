<?php

namespace Moguzz\Interest\Types;

use InvalidArgumentException;

/**
 * Class AbstractInterest
 *
 * @package Moguzz\Interest\Types
 */
abstract class AbstractInterest
{
    /**
     * @var float
     */
    private $interestRates;

    /**
     * @var float
     */
    private $totalCapital;

    /**
     * AbstractInterest constructor.
     *
     * @param $interestRates
     */
    public function __construct($interestRates)
    {
        if (! is_float($interestRates)) {
            throw new InvalidArgumentException('Interest rates is float type.');
        }

        $this->interestRates = $interestRates > 0.00 ? $interestRates / 100 : 0.00;
        $this->totalCapital = 0.00;
    }

    /**
     * @return float
     */
    public function getInterestRates()
    {
        return (double) $this->interestRates;
    }

    /**
     * @param $interestRates
     * @return $this
     */
    public function setInterestRates($interestRates)
    {
        if (! is_float($interestRates)) {
            throw new InvalidArgumentException('Interest rates is float type.');
        }

        $this->interestRates = $interestRates > 0.00 ? $interestRates / 100 : 0.00;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalCapital()
    {
        return (double) $this->totalCapital;
    }

    /**
     * @param $totalCapital
     * @return $this
     */
    public function setTotalCapital($totalCapital)
    {
        $this->totalCapital = $totalCapital;
        return $this;
    }

    /**
     * @return bool
     */
    public function interestRatesIsZeroed()
    {
        return $this->interestRates == 0.00;
    }
}
