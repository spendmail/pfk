<?php


namespace App\Repository;


use App\Entity\Pharmacy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;

class PharmacyRepository extends ServiceEntityRepository implements PharmacyRepositoryInterface
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ManagerRegistry $registry, ObjectManager $manager)
    {
        parent::__construct($registry, Pharmacy::class);
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
     * @param Pharmacy $pharmacy
     * @return Pharmacy
     */
    public function save(Pharmacy $pharmacy): Pharmacy
    {
        $this->manager->persist($pharmacy);
        $this->manager->flush();

        return $pharmacy;
    }
}
