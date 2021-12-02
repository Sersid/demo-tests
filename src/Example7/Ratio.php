<?php
declare(strict_types=1);

namespace App\Example7;

class Ratio
{
    private Sky $sky;

    public function __construct(Sky $sky)
    {
        $this->sky = $sky;
    }

    public function getValue(): float
    {
        return $this->sky->getValue();
    }
}

