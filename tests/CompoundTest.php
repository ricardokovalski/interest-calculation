<?php

namespace RicardoKovalski\InterestCalculation\Tests;

use PHPUnit\Framework\TestCase;
use RicardoKovalski\InterestCalculation\Exceptions\InterestValueException;
use RicardoKovalski\InterestCalculation\Types\Compound;

class CompoundTest extends TestCase
{
    private $interest;

    public function testAssertTrueInterestRatesZeroed()
    {
        $this->interest = new Compound();
        $this->assertTrue($this->interest->interestValueIsZeroed());
    }

    public function testExpectedExceptionWhenInterestValueIsNotFloatTypeOnConstruct()
    {
        $this->expectException(InterestValueException::class);
        $this->interest = new Compound('2.45');
    }

    public function testExpectedExceptionWhenInterestValueIsNotFloatTypeOnSetInterestValue()
    {
        $this->interest = new Compound();

        $this->expectException(InterestValueException::class);
        $this->interest->appendInterestValue('5,35');
    }

    public function testAssertEqualsInterestValue()
    {
        $this->interest = new Compound(2.75);
        $this->assertEquals(2.75, $this->interest->getInterestValue());
    }

    public function testAssertEqualsInterestRates()
    {
        $this->interest = new Compound(2.16);
        $this->assertFalse($this->interest->interestValueIsZeroed());
        $this->assertEquals(0.0216, $this->interest->getInterestRates());
    }

    public function testAssertEqualsTotalCapital()
    {
        $this->interest = new Compound(4.82);
        $this->interest->appendTotalCapital(168.25);
        $this->assertFalse($this->interest->interestValueIsZeroed());
        $this->assertEquals(168.25, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsResetInterestValue()
    {
        $this->interest = new Compound(1.85);
        $this->assertEquals(1.85, $this->interest->getInterestValue());
        $this->interest->resetInterestValue(2.25);
        $this->assertEquals(2.25, $this->interest->getInterestValue());
    }

    public function testAssertEqualsResetTotalCapital()
    {
        $this->interest = new Compound(2.33);
        $this->interest->appendTotalCapital(356.65);
        $this->assertEquals(356.65, $this->interest->getTotalCapital());
        $this->interest->resetTotalCapital(150.68);
        $this->assertEquals(150.68, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsAppendInterestValue()
    {
        $this->interest = new Compound(2.88);
        $this->assertEquals(2.88, $this->interest->getInterestValue());
        $this->interest->appendInterestValue(1.12);
        $this->assertEquals(4.00, $this->interest->getInterestValue());
    }

    public function testAssertEqualsValueCalculatedByInstallmentWhenInterestValueIsZeroed()
    {
        $this->interest = new Compound();
        $this->interest->appendTotalCapital(356.65);
        $this->assertEquals(356.65, $this->interest->getValueCalculatedByInstallment(1));
    }

    /**
     * @dataProvider providerValueCalculatedByInstallment
     * @param $valueCalculated
     * @param $installment
     */
    public function testAssertEqualsValueCalculatedByInstallment($valueCalculated, $installment)
    {
        $this->interest = new Compound(3.50);
        $this->interest->appendTotalCapital(574.78);
        $this->assertEquals($valueCalculated, $this->interest->getValueCalculatedByInstallment($installment));
    }

    /**
     * @return array
     */
    public function providerValueCalculatedByInstallment()
    {
        return [
            [574.78, 1],
            [594.89729999999997, 2],
            [615.71870549999994, 3],
            [637.2688601924998, 4],
            [659.57327029923727, 5],
        ];
    }
}
