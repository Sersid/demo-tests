<?php
declare(strict_types=1);

namespace Tests\Example8;

use App\Example8\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();

        $ratio = new RatioFixture();
        $this->calculator = new Calculator($ratio);
    }

    public function multiplyDataProvider(): array
    {
        return [
            [1, 2, 1.0],
            [1, 1, 0.5],
        ];
    }

    /**
     * @dataProvider multiplyDataProvider
     */
    public function testMultiply($a, $b, $expected): void
    {
        $this->calculator->multiply($a, $b);

        static::assertEquals($expected, $this->calculator->getResult());
    }

    public function addDataProvider(): array
    {
        return [
            [1, 2, 3.5],
            [1, 1, 2.5],
        ];
    }

    /**
     * @dataProvider addDataProvider
     */
    public function testAdd($a, $b, $expected): void
    {
        $this->calculator->add($a, $b);

        static::assertEquals($expected, $this->calculator->getResult());
    }
}
