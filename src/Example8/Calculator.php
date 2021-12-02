<?php
declare(strict_types=1);

namespace App\Example8;

class Calculator
{
    private RatioInterface $ratio;
    private float $result;

    public function __construct(RatioInterface $ratio)
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