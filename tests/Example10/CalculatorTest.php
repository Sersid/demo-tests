<?php
declare(strict_types=1);

namespace Tests\Example10;

use App\Example10\Calculator;
use App\Example10\Ratio;
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

    public function invalidArgsDataProvider(): array
    {
        return [
            [-1, 2],
            [1, -1],
        ];
    }

    /**
     * @dataProvider invalidArgsDataProvider
     */
    public function testMultiply($a, $b): void
    {
        $this->expectException(\InvalidArgumentException::class);
        // $this->expectErrorMessage('Значения не могут быть меньше 0');

        $this->calculator->multiply($a, $b);
    }
}
