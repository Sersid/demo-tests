<?php
declare(strict_types=1);

namespace Tests\Example11;

use App\Example11\Import;
use App\Example11\Product;
use App\Example11\ProductCollection;
use App\Example11\ProductRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ImportTest extends TestCase
{
    public function testRun(): void
    {
        $products = new ProductCollection();
        // ...

        $productRepository = $this->createMock(ProductRepositoryInterface::class);
        $productRepository->expects(self::once())
            ->method('getAll')
            ->willReturn($products);
        $productRepository->expects(self::exactly(5))
            ->method('add')
            ->with(self::callback(static function (Product $product) {
                // ...
            }));
        $productRepository->expects(self::exactly(3))
            ->method('update')
            ->with(self::callback(static function (Product $product) {
                // ...
            }));
        $productRepository->expects(self::never())
            ->method('delete')
            ->with(self::callback(static function (int $id) {
                // ...
            }));


        $import = new Import($productRepository);
        $import->run();
    }
}
