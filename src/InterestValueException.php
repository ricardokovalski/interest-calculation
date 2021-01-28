<?php

namespace RicardoKovalski\InterestCalculation;

use InvalidArgumentException;

/**
 * Class InterestValueException
 *
 * @package RicardoKovalski\InterestCalculation
 */
final class InterestValueException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('Interest value is float type.');
    }
}
