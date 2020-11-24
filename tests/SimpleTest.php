<?php

class SimpleTest extends \PHPUnit_Framework_TestCase
{
    private $interest;

    public function testAssertTrueInterestRatesZeroed()
    {
        $this->interest = new Moguzz\Interest\Types\Simple();
        $this->assertTrue($this->interest->interestRatesIsZeroed());
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnConstruct()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->interest = new Moguzz\Interest\Types\Simple('0.99');
    }

    public function testExpectedExceptionWhenInterestRatesIsNotFloatTypeOnSetInterestRates()
    {
        $this->interest = new Moguzz\Interest\Types\Simple();

        $this->expectException(InvalidArgumentException::class);
        $this->interest->setInterestRates('1,758');
    }

    public function testAssertEqualsInterestRates()
    {
        $this->interest = new Moguzz\Interest\Types\Simple();
        $this->interest->setInterestRates(2.687);

        $this->assertFalse($this->interest->interestRatesIsZeroed());

        $this->assertEquals(0.02687, $this->interest->getInterestRates());
    }

    public function testAssertEqualsTotalCapital()
    {
        $this->interest = new Moguzz\Interest\Types\Simple();
        $this->interest->setInterestRates(2.687)
            ->setTotalCapital(255.69);

        $this->assertFalse($this->interest->interestRatesIsZeroed());

        $this->assertEquals(255.69, $this->interest->getTotalCapital());
    }

    public function testAssertEqualsValueCalculated()
    {
        $this->interest = new Moguzz\Interest\Types\Simple();
        $this->interest->setTotalCapital(100.65);

        $this->assertEquals(100.65, $this->interest->getValueCalculated());

        $this->interest->setInterestRates(3.75);

        $this->assertEquals(104.42437500000001, $this->interest->getValueCalculated());
    }
}
