<?php


namespace App\Service;


use App\Entity\Distributor;
use App\Exception\DistributorsExistException;
use App\Repository\DistributorRepositoryInterface;
use LogicException;

class DistributorService implements DistributorServiceInterface
{
    /**
     * @var DistributorRepositoryInterface
     */
    protected $repository;

    public function __construct(DistributorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws LogicException
     */
    public function createInitialDistributors(): void
    {
        if (count($this->getAll()) !== null) {
            throw new DistributorsExistException();
        }

        $distributors = [
            new Distributor(1, 'Distributor 1'),
            new Distributor(2, 'Distributor 2'),
        ];

        foreach ($distributors as $distributor) {
            $this->repository->save($distributor);
        }
    }

    public function getAll(): array
    {
        return $this->repository->all();
    }
}
