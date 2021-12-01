<?php
declare(strict_types=1);

namespace Tests\Example1;

use App\Example1\ValueObject;
use PHPUnit\Framework\TestCase;

class ValueObjectTest extends TestCase
{
    public function testInteger(): void
    {
        // Arrange
        $int = 1;

        // Act
        $myObject = new ValueObject($int);

        // Assert
        self::assertSame(1, $myObject->getValue());
    }

    public function testString(): void
    {
        // Arrange
        $str = 'My string';

        // Act
        $myObject = new ValueObject($str);

        // Assert
        self::assertSame('My string', $myObject->getValue());
    }

    public function testFloat(): void
    {
        // Arrange
        $float = 3.14;

        // Act
        $myObject = new ValueObject($float);

        // Assert
        self::assertSame(3.14, $myObject->getValue());
    }

    public function testArray(): void
    {
        // Arrange
        $array = ['test'];

        // Act
        $myObject = new ValueObject($array);

        // Assert
        self::assertSame(['test'], $myObject->getValue());
    }

    public function testTrue(): void
    {
        // Arrange
        $bool = true;

        // Act
        $myObject = new ValueObject($bool);

        // Assert
        self::assertSame(true, $myObject->getValue());
    }

    public function testFalse(): void
    {
        // Arrange
        $bool = false;

        // Act
        $myObject = new ValueObject($bool);

        // Assert
        self::assertFalse($myObject->getValue());
    }

    public function testObject(): void
    {
        // Arrange
        $object = new \stdClass();

        // Act
        $myObject = new ValueObject($object);

        // Assert
        self::assertEquals(new \stdClass(), $myObject->getValue());
    }
}