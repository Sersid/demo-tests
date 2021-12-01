<?php
declare(strict_types=1);

namespace Tests\Example2;

use App\Example1\MyObject;
use PHPUnit\Framework\TestCase;

class TestMyObject extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testEquals($value): void
    {
        // Act
        $myObject = new MyObject($value);

        // Assert
        self::assertSame($value, $myObject->getValue());
    }

    public function dataProvider(): array
    {
        return [
            [1],
            ['My string'],
            [3.14],
            [['test']],
            [true],
            [false],
            [new \stdClass()],
        ];
    }
}