<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Pharmacy
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PharmacyRepository")
 */
class Pharmacy
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

    public function __construct(int $id, string $name)
    {
        $this->id = $id;

        $this->name = $name;
    }
}
