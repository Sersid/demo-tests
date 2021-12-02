<?php
declare(strict_types=1);

namespace Tests\Example8;

use App\Example8\RatioInterface;

class RatioFixture implements RatioInterface
{
    public function getValue(): float
    {
        return 0.5;
    }
}