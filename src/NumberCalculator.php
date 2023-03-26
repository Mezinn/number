<?php

declare(strict_types=1);

namespace mezinn\number;

use InvalidArgumentException;

final class NumberCalculator
{
    private NumberFactory $numberFactory;

    public function __construct(NumberFactory $numberFactory)
    {
        $this->numberFactory = $numberFactory;
    }

    public function add(Number $a, Number $b): Number
    {
        $result = bcadd(
            $a->getValue(),
            $b->getValue(),
            max(
                $a->getPrecision(),
                $b->getPrecision()
            )
        );
        return $this->numberFactory->create($result);
    }

    public function subtract(Number $a, Number $b): Number
    {
        $result = bcsub(
            $a->getValue(),
            $b->getValue(),
            max(
                $a->getPrecision(),
                $b->getPrecision()
            )
        );
        return $this->numberFactory->create($result);
    }

    public function multiply(Number $a, Number $b): Number
    {
        $result = bcmul(
            $a->getValue(),
            $b->getValue(),
            max(
                $a->getPrecision(),
                $b->getPrecision()
            )
        );
        return $this->numberFactory->create($result);
    }

    public function divide(Number $a, Number $b): Number
    {
        if (bccomp($b->getValue(), '0', 0) === 0) {
            throw new InvalidArgumentException("Division by zero.");
        }

        $result = bcdiv(
            $a->getValue(),
            $b->getValue(),
            max(
                $a->getPrecision(),
                $b->getPrecision()
            )
        );
        return $this->numberFactory->create($result);
    }

    public function pow(Number $a, Number $b): Number
    {
        if ($b->getPrecision() !== 0) {
            throw new InvalidArgumentException("Exponent must be an integer.");
        }

        $result = bcpow(
            $a->getValue(),
            $b->getValue(),
            max(
                $a->getPrecision(),
                $b->getPrecision()
            )
        );
        return $this->numberFactory->create($result);
    }

    public function sqrt(Number $a): Number
    {
        $result = bcsqrt($a->getValue(), $a->getPrecision());
        return $this->numberFactory->create($result);
    }
}
