<?php

class CompoundTest extends \PHPUnit_Framework_TestCase
{
    private $interest;

    public function testAssertTrueInterestRatesZeroed()
    {
        $this->interest = new Moguzz\Interest\Types\Compound();
        $this->assertTrue($this->interest->interestRatesIsZeroed());
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnConstruct()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->interest = new Moguzz\Interest\Types\Compound('2.45');
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnSetInterestRates()
    {
        $this->interest = new Moguzz\Interest\Types\Compound();

        $this->expectException(InvalidArgumentException::class);
        $this->interest->setInterestRates('5,35');
    }

    public function testAssertEqualsInterestRates()
    {
        $this->interest = new Moguzz\Interest\Types\Compound();
        $this->interest->setInterestRates(1.55);

        $this->assertFalse($this->interest->interestRatesIsZeroed());

        $this->assertEquals(0.0155, $this->interest->getInterestRates());
    }

    public function testAssertEqualsTotalCapital()
    {
        $this->interest = new Moguzz\Interest\Types\Compound();
        $this->interest->setInterestRates(1.99)
            ->setTotalCapital(450.75);

        $this->assertFalse($this->interest->interestRatesIsZeroed());

        $this->assertEquals(450.75, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsValueCalculated()
    {
        $this->interest = new Moguzz\Interest\Types\Compound();
        $this->interest->setTotalCapital(750.98);

        $this->assertEquals(750.98, $this->interest->getValueCalculated());

        $this->interest->setInterestRates(2.75);

        $this->assertEquals(750.98, $this->interest->getValueCalculated());

        $this->interest->setNumberInstallment(2);

        $this->assertEquals(771.63195000000007, $this->interest->getValueCalculated());
    }
}
