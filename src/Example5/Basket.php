<?php
declare(strict_types=1);

namespace App\Example5;

class Basket
{
    private array $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(array $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(int $key): void
    {
        unset($this->items[$key]);
    }
}