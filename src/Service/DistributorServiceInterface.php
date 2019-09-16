<?php


namespace App\Service;


interface DistributorServiceInterface
{

    public function createInitialDistributors(): void;

    public function getAll(): array;
}
