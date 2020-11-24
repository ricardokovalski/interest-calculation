<?php

class FinancialTest extends \PHPUnit_Framework_TestCase
{
    private $interest;

    public function testAssertTrueInterestRatesZeroed()
    {
        $this->interest = new Moguzz\Interest\Types\Financial();
        $this->assertTrue($this->interest->interestRatesIsZeroed());
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnConstruct()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->interest = new Moguzz\Interest\Types\Financial('3.20');
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnSetInterestRates()
    {
        $this->interest = new Moguzz\Interest\Types\Financial();

        $this->expectException(InvalidArgumentException::class);
        $this->interest->setInterestRates('9,68');
    }

    public function testAssertEqualsInterestRates()
    {
        $this->interest = new Moguzz\Interest\Types\Financial();
        $this->interest->setInterestRates(2.75);

        $this->assertFalse($this->interest->interestRatesIsZeroed());

        $this->assertEquals(0.0275, $this->interest->getInterestRates());
    }

    public function testAssertEqualsTotalCapital()
    {
        $this->interest = new Moguzz\Interest\Types\Financial();
        $this->interest->setInterestRates(3.79)
            ->setTotalCapital(520.69);

        $this->assertFalse($this->interest->interestRatesIsZeroed());

        $this->assertEquals(520.69000000000005, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsValueCalculated()
    {
        $this->interest = new Moguzz\Interest\Types\Financial();
        $this->interest->setTotalCapital(750.98);

        $this->assertEquals(750.98, $this->interest->getValueCalculated());

        $this->interest->setInterestRates(2.75);

        $this->assertEquals(750.98, $this->interest->getValueCalculated());

        $this->interest->setNumberInstallment(2);

        $this->assertEquals(195.52449534525223, $this->interest->getValueCalculated());
    }
}
