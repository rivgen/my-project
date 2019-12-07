<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cityName;

    /**
     * @ORM\Column(type="integer")
     */
    private $iso;

    /**
     * @ORM\Column(type="integer")
     */
    private $regionIso;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getIso(): ?int
    {
        return $this->iso;
    }

    public function setIso(int $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getRegionIso(): ?int
    {
        return $this->regionIso;
    }

    public function setRegionIso(int $regionIso): self
    {
        $this->regionIso = $regionIso;

        return $this;
    }
}
