<?php

namespace RicardoKovalski\InterestCalculation\Tests;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\InterestCalculation\Exceptions\InterestValueException;
use RicardoKovalski\InterestCalculation\Types\Financial;

class FinancialTest extends TestCase
{
    private $interest;

    public function testAssertTrueInterestValueIsZeroed()
    {
        $this->interest = new Financial();
        $this->assertTrue($this->interest->interestValueIsZeroed());
    }

    public function testExpectedExceptionWhenInterestValueIsNotFloatTypeOnConstruct()
    {
        $this->expectException(InterestValueException::class);
        $this->interest = new Financial('3.20');
    }

    public function testExpectedExceptionWhenInterestValueIsNotFloatTypeOnSetInterestValue()
    {
        $this->interest = new Financial();
        $this->expectException(InterestValueException::class);
        $this->interest->appendInterestValue('9,68');
    }

    public function testAssertEqualsInterestValue()
    {
        $this->interest = new Financial(2.75);
        $this->assertEquals(2.75, $this->interest->getInterestValue());
    }

    public function testAssertEqualsInterestRates()
    {
        $this->interest = new Financial(2.75);
        $this->assertFalse($this->interest->interestValueIsZeroed());
        $this->assertEquals(0.0275, $this->interest->getInterestRates());
    }

    public function testAssertEqualsTotalCapital()
    {
        $this->interest = new Financial(3.79);
        $this->interest->appendTotalCapital(520.69);
        $this->assertFalse($this->interest->interestValueIsZeroed());
        $this->assertEquals(520.69000000000005, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsResetInterestValue()
    {
        $this->interest = new Financial(3.79);
        $this->assertEquals(3.79, $this->interest->getInterestValue());
        $this->interest->resetInterestValue(2.95);
        $this->assertEquals(2.95, $this->interest->getInterestValue());
    }

    public function testAssertEqualsResetTotalCapital()
    {
        $this->interest = new Financial(2.99);
        $this->interest->appendTotalCapital(202.95);
        $this->assertEquals(202.95, $this->interest->getTotalCapital());
        $this->interest->resetTotalCapital(101.58);
        $this->assertEquals(101.58, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsAppendInterestValue()
    {
        $this->interest = new Financial(3.75);
        $this->assertEquals(3.75, $this->interest->getInterestValue());
        $this->interest->appendInterestValue(1.15);
        $this->assertEquals(4.90, $this->interest->getInterestValue());
    }

    /**
     * @dataProvider providerValueCalculatedByInstallment
     * @param $valueCalculated
     * @param $installment
     */
    public function testAssertEqualsValueCalculatedByInstallment($valueCalculated, $installment)
    {
        $this->interest = new Financial(2.75);
        $this->interest->appendTotalCapital(750.98);
        $this->assertEquals($valueCalculated, $this->interest->getValueCalculatedByInstallment($installment));
    }

    /**
     * @return array
     */
    public function providerValueCalculatedByInstallment()
    {
        return [
            [750.98, 1],
            [782.09798138100894, 2],
            [792.65736078101031, 3],
            [803.31005386011498, 4],
            [814.05601256773991, 5],
        ];
    }
}
