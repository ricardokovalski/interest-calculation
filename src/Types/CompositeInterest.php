<?php

namespace RicardoKovalski\InterestCalculation\Types;

use RicardoKovalski\InterestCalculation\Contracts\Interest;
use RicardoKovalski\InterestCalculation\Exceptions\InterestValueException;

/**
 * Class CompositeInterest
 *
 * @package RicardoKovalski\InterestCalculation\Types
 */
abstract class CompositeInterest implements Interest
{
    /**
     * @var float $interestValue
     */
    private $interestValue;

    /**
     * @var float $interestRates
     */
    private $interestRates;

    /**
     * @var float $totalCapital
     */
    private $totalCapital;

    /**
     * CompositeInterest constructor.
     *
     * @param $interestValue
     */
    public function __construct($interestValue)
    {
        if (! is_float($interestValue)) {
            throw new InterestValueException();
        }

        $this->interestValue = $interestValue;
        $this->interestRates = $this->parseToInterestRates($interestValue);
        $this->totalCapital = 0.00;
    }

    /**
     * @param $interestValue
     * @return $this
     */
    public function appendInterestValue($interestValue)
    {
        if (! is_float($interestValue)) {
            throw new InterestValueException();
        }

        $this->interestValue += $interestValue;

        $this->interestRates = $this->parseToInterestRates($this->getInterestvalue());

        return $this;
    }

    /**
     * @param $totalCapital
     * @return $this
     */
    public function appendTotalCapital($totalCapital)
    {
        $this->totalCapital += $totalCapital;
        return $this;
    }

    /**
     * @param $totalCapital
     * @return $this
     */
    public function resetTotalCapital($totalCapital = 0.00)
    {
        $this->totalCapital = $totalCapital;
        return $this;
    }

    /**
     * @param float $interestValue
     * @return $this
     */
    public function resetInterestValue($interestValue = 0.00)
    {
        $this->interestValue = $interestValue;
        $this->interestRates = $this->parseToInterestRates($interestValue);
        return $this;
    }

    /**
     * @return float
     */
    public function getInterestValue()
    {
        return (double) $this->interestValue;
    }

    /**
     * @return float
     */
    public function getInterestRates()
    {
        return (double) $this->interestRates;
    }

    /**
     * @return float
     */
    public function getTotalCapital()
    {
        return (double) $this->totalCapital;
    }

    /**
     * @return bool
     */
    public function interestValueIsZeroed()
    {
        return $this->interestValue == 0.00;
    }

    /**
     * @param $interestValue
     * @return float|int
     */
    private function parseToInterestRates($interestValue)
    {
        if ($interestValue <= 0.00) {
            return 0.00;
        }

        return $interestValue / 100;
    }
}
