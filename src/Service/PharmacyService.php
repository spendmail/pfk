<?php


namespace App\Service;


use App\Repository\PharmacyRepositoryInterface;

class PharmacyService implements PharmacyServiceInterface
{
    /**
     * @var PharmacyRepositoryInterface
     */
    protected $repository;

    public function __construct(PharmacyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): array
    {
        return $this->repository->all();
    }
}
