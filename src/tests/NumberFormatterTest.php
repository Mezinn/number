<?php

declare(strict_types=1);

use mezinn\number\Number;
use mezinn\number\NumberFormatter;
use PHPUnit\Framework\TestCase;

final class NumberFormatterTest extends TestCase
{
    public function testFormatWithDecimalSeparator(): void
    {
        $formatter = new NumberFormatter();

        $number = new Number('1234567.89', 2);
        $result = $formatter->format($number, ',');

        $this->assertEquals('1,234,567.89', $result);
    }

    public function testFormatWithoutDecimalSeparator(): void
    {
        $formatter = new NumberFormatter();

        $number = new Number('1234567', 0);
        $result = $formatter->format($number, ',');

        $this->assertEquals('1,234,567', $result);
    }

    public function testFormatWithNoThousands(): void
    {
        $formatter = new NumberFormatter();

        $number = new Number('123', 2);
        $result = $formatter->format($number, ',');

        $this->assertEquals('123', $result);
    }

    public function testFormatWithForceSign(): void
    {
        $formatter = new NumberFormatter();
        $number = new Number('-123.45', 2);

        $result = $formatter->format($number, ',', true);

        $this->assertEquals('-123.45', $result);

        $number = new Number('123.45', 2);

        $result = $formatter->format($number, ',', true);

        $this->assertEquals('+123.45', $result);
    }
}
