<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RestauranteRepository")
 */
class Restaurante
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oferta", mappedBy="restaurante")
     */
    private $ofertas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Valoration", mappedBy="restaurante")
     */
    private $valorations;

    public function __construct()
    {
        $this->ofertas = new ArrayCollection();
        $this->valorations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Oferta[]
     */
    public function getOfertas(): Collection
    {
        return $this->ofertas;
    }

    public function addOferta(Oferta $oferta): self
    {
        if (!$this->ofertas->contains($oferta)) {
            $this->ofertas[] = $oferta;
            $oferta->setRestaurante($this);
        }

        return $this;
    }

    public function removeOferta(Oferta $oferta): self
    {
        if ($this->ofertas->contains($oferta)) {
            $this->ofertas->removeElement($oferta);
            // set the owning side to null (unless already changed)
            if ($oferta->getRestaurante() === $this) {
                $oferta->setRestaurante(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Valoration[]
     */
    public function getValorations(): Collection
    {
        return $this->valorations;
    }

    public function addValoration(Valoration $valoration): self
    {
        if (!$this->valorations->contains($valoration)) {
            $this->valorations[] = $valoration;
            $valoration->setRestaurante($this);
        }

        return $this;
    }

    public function removeValoration(Valoration $valoration): self
    {
        if ($this->valorations->contains($valoration)) {
            $this->valorations->removeElement($valoration);
            // set the owning side to null (unless already changed)
            if ($valoration->getRestaurante() === $this) {
                $valoration->setRestaurante(null);
            }
        }

        return $this;
    }
}
