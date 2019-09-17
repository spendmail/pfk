<?php


namespace App\Repository;


use App\Entity\Product;

interface ProductRepositoryInterface
{
    /**
     * @param array $criteria
     * @param array|null $order
     * @param int|null $limit
     * @param int|null $offset
     * @return array
     */
    public function all(array $criteria = [], array $order = null, int $limit = null, int $offset = null): array;

    /**
     * @param Product $product
     * @return Product
     */
    public function save(Product $product): Product;

}
