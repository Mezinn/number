<?php

declare(strict_types=1);

namespace mezinn\number\test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use mezinn\number\NumberFactory;
use mezinn\number\Number;

class NumberFactoryTest extends TestCase
{
    public function testCreateWithValidValue(): void
    {
        $factory = new NumberFactory();
        $number = $factory->create('123.45');

        $this->assertInstanceOf(Number::class, $number);
        $this->assertEquals('123.45', $number->getValue());
        $this->assertEquals(2, $number->getPrecision());
    }

    public function testCreateWithInvalidValue(): void
    {
        $factory = new NumberFactory();

        $this->expectException(InvalidArgumentException::class);
        $factory->create('123abc');
    }

    public function testCreateWithEmptyValue(): void
    {
        $factory = new NumberFactory();

        $this->expectException(InvalidArgumentException::class);
        $factory->create('');
    }

    public function testCreateWithPositiveInteger(): void
    {
        $factory = new NumberFactory();
        $number = $factory->create('123');

        $this->assertInstanceOf(Number::class, $number);
        $this->assertEquals('123', $number->getValue());
        $this->assertEquals(0, $number->getPrecision());
    }

    public function testCreateWithNegativeInteger(): void
    {
        $factory = new NumberFactory();
        $number = $factory->create('-123');

        $this->assertInstanceOf(Number::class, $number);
        $this->assertEquals('-123', $number->getValue());
        $this->assertEquals(0, $number->getPrecision());
    }

    public function testCreateWithPositiveFloat(): void
    {
        $factory = new NumberFactory();
        $number = $factory->create('123.456');

        $this->assertInstanceOf(Number::class, $number);
        $this->assertEquals('123.456', $number->getValue());
        $this->assertEquals(3, $number->getPrecision());
    }

    public function testCreateWithNegativeFloat(): void
    {
        $factory = new NumberFactory();
        $number = $factory->create('-123.456');

        $this->assertInstanceOf(Number::class, $number);
        $this->assertEquals('-123.456', $number->getValue());
        $this->assertEquals(3, $number->getPrecision());
    }

    public function testCreateWithExponentialValue(): void
    {
        $factory = new NumberFactory();
        $this->expectException(InvalidArgumentException::class);
        $factory->create('1.23e2');
    }
}
