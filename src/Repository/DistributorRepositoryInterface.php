<?php


namespace App\Repository;


use App\Entity\Distributor;

interface DistributorRepositoryInterface
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
     * @param Distributor $distributor
     * @return Distributor
     */
    public function save(Distributor $distributor): Distributor;

}
