<?php
declare(strict_types=1);

namespace App\Example7;

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

    public function add(float $a, float $b): void
    {
        $this->result =  $a + $b + $this->ratio->getValue();
    }

    public function getResult(): float
    {
        return $this->result;
    }
}