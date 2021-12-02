<?php
declare(strict_types=1);

namespace App\Example11;

interface ProductRepositoryInterface
{
    public function getAll(): ProductCollection;
    public function add(Product $product);
    public function update(Product $product);
    public function delete(int $id);
}