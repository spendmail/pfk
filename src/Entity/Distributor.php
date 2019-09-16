<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Distributor
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\DistributorRepository")
 */
class Distributor
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __construct(int $id, string $name)
    {
        $this->id = $id;

        $this->name = $name;
    }
}
