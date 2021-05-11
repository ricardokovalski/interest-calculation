<?php

namespace RicardoKovalski\InterestCalculation\Exceptions;

use InvalidArgumentException;

/**
 * Class InterestValueException
 *
 * @package RicardoKovalski\InterestCalculation\Exceptions
 */
final class InterestValueException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('Interest value is float type.');
    }
}
