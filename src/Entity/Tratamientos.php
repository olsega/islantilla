<?php

namespace App\Entity;

use App\Repository\TratamientosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TratamientosRepository::class)]
class Tratamientos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_tratamiento = null;

    #[ORM\Column(length: 30)]
    private ?string $nombre_tratamiento = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $precio = null;

    #[ORM\Column]
    private ?bool $activo = null;

    #[ORM\OneToMany(targetEntity: Citas::class, mappedBy: 'id_tratamiento')]
    private Collection $citas;

    public function __construct()
    {
        $this->citas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTratamiento(): ?int
    {
        return $this->id_tratamiento;
    }

    public function setIdTratamiento(int $id_tratamiento): static
    {
        $this->id_tratamiento = $id_tratamiento;

        return $this;
    }

    public function getNombreTratamiento(): ?string
    {
        return $this->nombre_tratamiento;
    }

    public function setNombreTratamiento(string $nombre_tratamiento): static
    {
        $this->nombre_tratamiento = $nombre_tratamiento;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): static
    {
        $this->precio = $precio;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * @return Collection<int, Citas>
     */
    public function getCitas(): Collection
    {
        return $this->citas;
    }

    public function addCita(Citas $cita): static
    {
        if (!$this->citas->contains($cita)) {
            $this->citas->add($cita);
            $cita->setIdTratamiento($this);
        }

        return $this;
    }

    public function removeCita(Citas $cita): static
    {
        if ($this->citas->removeElement($cita)) {
            // set the owning side to null (unless already changed)
            if ($cita->getIdTratamiento() === $this) {
                $cita->setIdTratamiento(null);
            }
        }

        return $this;
    }
}
