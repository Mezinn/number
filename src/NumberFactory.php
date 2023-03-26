<?php

declare(strict_types=1);

namespace mezinn\number;

use InvalidArgumentException;

final class NumberFactory
{
    public function create(string $value): Number
    {
        $pattern = '/^([-+])?([0-9]+(\.[0-9]+)?)$/';

        if (!preg_match($pattern, $value, $matches)) {
            throw new InvalidArgumentException("Invalid value provided. Value must be a regular number.");
        }

        if (!isset($matches[2])) {
            throw new InvalidArgumentException("Invalid value provided. Value must be a regular number.");
        }

        $precision = 0;

        if (str_contains($matches[2], '.')) {
            $precision = strlen(substr($matches[2], strpos($matches[2], '.') + 1));
        }

        return new Number($matches[0], $precision);
    }
}
