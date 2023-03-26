<?php

declare(strict_types=1);

namespace mezinn\number\test;

use PHPUnit\Framework\TestCase;
use mezinn\number\Number;

class NumberTest extends TestCase
{
    public function testGetValue(): void
    {
        $number = new Number('123.45', 2);

        $this->assertEquals('123.45', $number->getValue());
    }

    public function testGetPrecision(): void
    {
        $number = new Number('123.45', 2);

        $this->assertEquals(2, $number->getPrecision());
    }
}
