<?php


namespace App\Repository;


use App\Entity\Distributor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;

class DistributorRepository extends ServiceEntityRepository implements DistributorRepositoryInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Distributor::class);
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
     * @param Distributor $distributor
     * @return Distributor
     */
    public function save(Distributor $distributor): Distributor
    {
        $this->manager->persist($distributor);
        $this->manager->flush();

        return $distributor;
    }
}
