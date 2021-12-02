<?php
declare(strict_types=1);

namespace Tests\Example6;

use App\Example6\Calculator;
use App\Example6\Ratio;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();

        $ratio = new Ratio(0.5);
        $this->calculator = new Calculator($ratio);
    }

    public function addDataProvider(): array
    {
        return [
            [1, 2, 1.0],
            [1, 1, 0.5],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testMultiply($a, $b, $expected): void
    {
        $this->calculator->multiply($a, $b);

        static::assertEquals($expected, $this->calculator->getResult());
    }
}
