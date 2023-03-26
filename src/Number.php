<?php

declare(strict_types=1);

namespace mezinn\number;

final class Number
{
    private string $value;
    private int $precision;

    public function __construct(
        string $value,
        int    $precision
    )
    {
        $this->value = $value;
        $this->precision = $precision;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getPrecision(): int
    {
        return $this->precision;
    }
}
