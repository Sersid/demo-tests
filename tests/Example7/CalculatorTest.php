<?php
declare(strict_types=1);

namespace Tests\Example7;

use App\Example6\Calculator;
use App\Example6\Ratio;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();

        $ratio = $this->createMock(Ratio::class);
        $ratio->method('getValue')->willReturn(0.7);

        $this->calculator = new Calculator($ratio);
    }

    public function addDataProvider(): array
    {
        return [
            [1, 2, 1.4],
            [1, 1, 0.7],
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
