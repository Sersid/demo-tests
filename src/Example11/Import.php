<?php
declare(strict_types=1);

namespace App\Example11;

class Import
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function run(): void
    {
        $products = $this->productRepository->getAll();

        foreach ($products as $product) {
            $this->productRepository->update($product);
        }
        $product = new Product();
        $this->productRepository->add($product);

        // ...
        $this->productRepository->delete(1);
    }
}