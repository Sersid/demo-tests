<?php
declare(strict_types=1);

namespace App\Example6;

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
        $this->result =  $a * $b * $this->ratio->getValue();
    }

    public function getResult(): float
    {
        return $this->result;
    }
}