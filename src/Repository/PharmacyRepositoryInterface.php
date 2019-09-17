<?php


namespace App\Repository;


use App\Entity\Pharmacy;

interface PharmacyRepositoryInterface
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
     * @param Pharmacy $pharmacy
     * @return Pharmacy
     */
    public function save(Pharmacy $pharmacy): Pharmacy;

}
