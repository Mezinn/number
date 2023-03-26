<?php

declare(strict_types=1);

namespace mezinn\number;

final class NumberFormatter
{
    public function format(
        Number $number,
        string $separator = ',',
        bool $forceSign = false
    ): string {
        $value = $number->getValue();
        $isNegative = false;
        $decimal = '';

        if (str_starts_with($value, '-')) {
            $isNegative = true;
            $value = substr($value, 1);
        }

        if (str_contains($value, '.')) {
            [$integer, $decimal] = explode('.', $value);
        } else {
            $integer = $value;
        }

        $parts = str_split(strrev($integer), 3);
        $integer = strrev(implode($separator, $parts));

        if ($isNegative) {
            $integer = '-' . $integer;
        } elseif ($forceSign) {
            $integer = '+' . $integer;
        }

        return $integer . ($decimal ? '.' . $decimal : '');
    }
}
