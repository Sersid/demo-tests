<?php
declare(strict_types=1);

namespace Tests\Example7;

use App\Example7\Calculator;
use App\Example7\Ratio;
use App\Example7\Finger;
use App\Example7\Sky;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();

        $finder = new Finger();
        $sky = new Sky();
        $sky->touch($finder);
        $ratio = new Ratio($sky);

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
