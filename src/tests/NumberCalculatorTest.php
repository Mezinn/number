<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use mezinn\number\NumberCalculator;
use mezinn\number\Number;
use mezinn\number\NumberFactory;

class NumberCalculatorTest extends TestCase
{
    public function testAdd(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('67.89');

        $result = $calculator->add($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('191.34', $result->getValue());
        $this->assertEquals(2, $result->getPrecision());
    }

    public function testSubtract(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('67.89');

        $result = $calculator->subtract($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('55.56', $result->getValue());
        $this->assertEquals(2, $result->getPrecision());
    }

    public function testMultiply(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('12.34');
        $b = $factory->create('5.67');

        $result = $calculator->multiply($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('69.96', $result->getValue());
        $this->assertEquals(2, $result->getPrecision());
    }

    public function testDivide(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('67.89');

        $result = $calculator->divide($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('1.81', $result->getValue());
        $this->assertEquals(2, $result->getPrecision());
    }

    public function testPow(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('3');
        $b = $factory->create('4');

        $result = $calculator->pow($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('81', $result->getValue());
        $this->assertEquals(0, $result->getPrecision());
    }

    public function testSqrt(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');

        $result = $calculator->sqrt($a);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('11.11', $result->getValue());
        $this->assertEquals(2, $result->getPrecision());
    }

    public function testDivideByZero(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('0');

        $this->expectException(InvalidArgumentException::class);

        $calculator->divide($a, $b);
    }

    public function testAddWithDifferentPrecisions(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('6.789');

        $result = $calculator->add($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('130.239', $result->getValue());
        $this->assertEquals(3, $result->getPrecision());
    }

    public function testSubtractWithDifferentPrecisions(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('6.789');

        $result = $calculator->subtract($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('116.661', $result->getValue());
        $this->assertEquals(3, $result->getPrecision());
    }

    public function testMultiplyWithDifferentPrecisions(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('12.34');
        $b = $factory->create('5.670',);

        $result = $calculator->multiply($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('69.967', $result->getValue());
        $this->assertEquals(3, $result->getPrecision());
    }

    public function testDivideWithDifferentPrecisions(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('123.45');
        $b = $factory->create('6.789');

        $result = $calculator->divide($a, $b);

        $this->assertInstanceOf(Number::class, $result);
        $this->assertEquals('18.183', $result->getValue());
        $this->assertEquals(3, $result->getPrecision());
    }

    public function testPowWithDifferentPrecisions(): void
    {
        $factory = new NumberFactory();
        $calculator = new NumberCalculator($factory);

        $a = $factory->create('3');
        $b = $factory->create('4.01');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Exponent must be an integer.');

        $calculator->pow($a, $b);
    }
}
