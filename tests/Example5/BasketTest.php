<?php
declare(strict_types=1);

namespace Tests\Example5;

use App\Example5\Basket;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function testCreate(): Basket
    {
        $basket = new Basket();

        self::assertEmpty($basket->getItems());

        return $basket;
    }

    /**
     * @depends testCreate
     */
    public function testAddItem(Basket $basket): Basket
    {
        $basket->addItem(['name' => 'Товар', 'price' => 123]);

        self::assertCount(1, $basket->getItems());

        return $basket;
    }

    /**
     * @depends testAddItem
     */
    public function testRemoveItem(Basket $basket): void
    {
        $basket->removeItem(0);

        self::assertEmpty($basket->getItems());
    }
}
