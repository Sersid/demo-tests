<?php
declare(strict_types=1);

namespace App\Example10;

use InvalidArgumentException;

class Calculator
{
    private Ratio $ratio;
    private float $result;

    public function __construct(Ratio $ratio)
    {
        $this->ratio = $ratio;
    }

    public function multiply(float $a, float $b): void
    {
        if ($a < 0 || $b < 0) {
            throw new InvalidArgumentException('Значения не могут быть меньше 0');
        }

        $this->result =  $a * $b * $this->ratio->getValue();
    }

    public function add(float $a, float $b): void
    {
        $this->result =  $a + $b + $this->ratio->getValue();
    }

    public function getResult(): float
    {
        return $this->result;
    }
}