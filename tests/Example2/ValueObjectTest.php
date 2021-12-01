<?php
declare(strict_types=1);

namespace Tests\Example2;

use App\Example1\ValueObject;
use PHPUnit\Framework\TestCase;

class ValueObjectTest extends TestCase
{
    /**
     * @dataProvider valueDataProvider
     */
    public function testGetValue($value): void
    {
        // Act
        $myObject = new ValueObject($value);

        // Assert
        self::assertSame($value, $myObject->getValue());
    }

    public function valueDataProvider(): array
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