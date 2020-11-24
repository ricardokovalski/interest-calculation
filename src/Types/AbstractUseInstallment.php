<?php

namespace Moguzz\Interest\Types;

use Moguzz\Interest\Contracts\UseInstallment;

/**
 * Class AbstractUseInstallment
 *
 * @package Moguzz\Interest\Types
 */
class AbstractUseInstallment extends AbstractInterest implements UseInstallment
{
    /**
     * @var int $numberInstallment
     */
    private $numberInstallment;

    /**
     * AbstractUseInstallment constructor.
     *
     * @param $interestRates
     */
    public function __construct($interestRates)
    {
        parent::__construct($interestRates);
        $this->numberInstallment = 1;
    }

    /**
     * @param int $numberInstallment
     * @return $this
     */
    public function setNumberInstallment($numberInstallment)
    {
        $this->numberInstallment = $numberInstallment;
        return $this;
    }

    /**
     * @return int $numberInstallment
     */
    public function getNumberInstallment()
    {
        return $this->numberInstallment;
    }
}
