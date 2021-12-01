<?php
declare(strict_types=1);

namespace Tests\Example1;

use App\Example1\MyObject;
use PHPUnit\Framework\TestCase;

class TestMyObject extends TestCase
{
    public function testInteger(): void
    {
        // Arrange
        $int = 1;

        // Act
        $myObject = new MyObject($int);

        // Assert
        self::assertSame(1, $myObject->getValue());
    }

    public function testString(): void
    {
        // Arrange
        $str = 'My string';

        // Act
        $myObject = new MyObject($str);

        // Assert
        self::assertSame('My string', $myObject->getValue());
    }

    public function testFloat(): void
    {
        // Arrange
        $float = 3.14;

        // Act
        $myObject = new MyObject($float);

        // Assert
        self::assertSame(3.14, $myObject->getValue());
    }

    public function testArray(): void
    {
        // Arrange
        $array = ['test'];

        // Act
        $myObject = new MyObject($array);

        // Assert
        self::assertSame(['test'], $myObject->getValue());
    }

    public function testTrue(): void
    {
        // Arrange
        $bool = true;

        // Act
        $myObject = new MyObject($bool);

        // Assert
        self::assertSame(true, $myObject->getValue());
    }

    public function testFalse(): void
    {
        // Arrange
        $bool = false;

        // Act
        $myObject = new MyObject($bool);

        // Assert
        self::assertFalse($myObject->getValue());
    }

    public function testObject(): void
    {
        // Arrange
        $object = new \stdClass();

        // Act
        $myObject = new MyObject($object);

        // Assert
        self::assertEquals(new \stdClass(), $myObject->getValue());
    }
}