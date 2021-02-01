<?php

use PHPUnit\Framework\TestCase;
use RicardoKovalski\InterestCalculation\InterestValueException;
use RicardoKovalski\InterestCalculation\Types\Simple;

class SimpleTest extends TestCase
{
    private $interest;

    public function testAssertTrueInterestRatesZeroed()
    {
        $this->interest = new Simple();
        $this->assertTrue($this->interest->interestValueIsZeroed());
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnConstruct()
    {
        $this->expectException(InterestValueException::class);
        $this->interest = new Simple('0.99');
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnSetInterestRates()
    {
        $this->interest = new Simple();
        $this->expectException(InterestValueException::class);
        $this->interest->appendInterestValue('1,758');
    }

    public function testAssertEqualsInterestValue()
    {
        $this->interest = new Simple(2.687);
        $this->assertEquals(2.687, $this->interest->getInterestValue());
    }

    public function testAssertEqualsInterestRates()
    {
        $this->interest = new Simple(2.687);
        $this->assertFalse($this->interest->interestValueIsZeroed());
        $this->assertEquals(0.02687, $this->interest->getInterestRates());
    }

    public function testAssertEqualsTotalCapital()
    {
        $this->interest = new Simple(0.02687);
        $this->interest->appendTotalCapital(255.69);
        $this->assertFalse($this->interest->interestValueIsZeroed());
        $this->assertEquals(255.69, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsResetInterestValue()
    {
        $this->interest = new Simple(3.79);
        $this->assertEquals(3.79, $this->interest->getInterestValue());
        $this->interest->resetInterestValue(2.95);
        $this->assertEquals(2.95, $this->interest->getInterestValue());
    }

    public function testAssertEqualsResetTotalCapital()
    {
        $this->interest = new Simple(2.99);
        $this->interest->appendTotalCapital(202.95);
        $this->assertEquals(202.95, $this->interest->getTotalCapital());
        $this->interest->resetTotalCapital(101.58);
        $this->assertEquals(101.58, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsAppendInterestValue()
    {
        $this->interest = new Simple(1.55);
        $this->assertEquals(1.55, $this->interest->getInterestValue());
        $this->interest->appendInterestValue(3.15);
        $this->assertEquals(4.70, $this->interest->getInterestValue());
    }

    /**
     * @dataProvider providerValueCalculatedByInstallment
     * @param $valueCalculated
     * @param $installment
     */
    public function testAssertEqualsValueCalculatedByInstallment($valueCalculated, $installment)
    {
        $this->interest = new Simple(3.75);
        $this->interest->appendTotalCapital(100.65);
        $this->assertEquals($valueCalculated, $this->interest->getValueCalculatedByInstallment($installment));
    }

    /**
     * @return array
     */
    public function providerValueCalculatedByInstallment()
    {
        return [
            [100.65, 1],
            [104.42437500000001, 2],
            [104.42437500000001, 3],
            [104.42437500000001, 4],
            [104.42437500000001, 5],
        ];
    }
}
