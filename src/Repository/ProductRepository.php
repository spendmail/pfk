<?php


namespace App\Repository;


use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;

class ProductRepository extends ServiceEntityRepository implements ProductRepositoryInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Product::class);
        $this->manager = $manager;
    }

    /**
     * @param array $criteria
     * @param array|null $order
     * @param int|null $limit
     * @param int|null $offset
     * @return array
     */
    public function all(array $criteria = [], array $order = null, int $limit = null, int $offset = null): array
    {
        return parent::findBy($criteria, $order, $limit, $offset);
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function save(Product $product): Product
    {
        $this->manager->persist($product);
        $this->manager->flush();

        return $pharmacy;
    }
}
