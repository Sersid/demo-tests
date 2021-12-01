<?php
declare(strict_types=1);

namespace Tests\Example3;

use App\Example1\ValueObject;
use PHPUnit\Framework\TestCase;

class ValueObjectTest extends TestCase
{
    /**
     * @dataProvider integerDataProvider
     * @dataProvider floatDataProvider
     * @dataProvider stringDataProvider
     * @dataProvider boolDataProvider
     * @dataProvider objectDataProvider
     */
    public function testGetValue($value): void
    {
        // Act
        $myObject = new ValueObject($value);

        // Assert
        self::assertSame($value, $myObject->getValue());
    }

    public function integerDataProvider(): array
    {
        return [
            [1],
        ];
    }

    public function floatDataProvider(): array
    {
        return [
            [3.14],
        ];
    }

    public function stringDataProvider(): array
    {
        return [
            ['My string'],
        ];
    }

    public function boolDataProvider(): array
    {
        return [
            [true],
            [false],
        ];
    }

    public function objectDataProvider(): array
    {
        return [
            [new \stdClass()],
        ];
    }
}