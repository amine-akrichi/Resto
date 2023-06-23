<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ClientName = null;

    #[ORM\Column(length: 255)]
    private ?string $ClientEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $ClientPhone = null;

    #[ORM\Column(length: 255)]
    private ?string $ReservationDate = null;

    #[ORM\Column(length: 255)]
    private ?string $ReservationTime = null;

    #[ORM\Column]
    private ?int $NumberOfPersons = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientName(): ?string
    {
        return $this->ClientName;
    }

    public function setClientName(string $ClientName): self
    {
        $this->ClientName = $ClientName;

        return $this;
    }

    public function getClientEmail(): ?string
    {
        return $this->ClientEmail;
    }

    public function setClientEmail(string $ClientEmail): self
    {
        $this->ClientEmail = $ClientEmail;

        return $this;
    }

    public function getClientPhone(): ?string
    {
        return $this->ClientPhone;
    }

    public function setClientPhone(string $ClientPhone): self
    {
        $this->ClientPhone = $ClientPhone;

        return $this;
    }

    public function getReservationDate(): ?string
    {
        return $this->ReservationDate;
    }

    public function setReservationDate(string $ReservationDate): self
    {
        $this->ReservationDate = $ReservationDate;

        return $this;
    }

    public function getReservationTime(): ?string
    {
        return $this->ReservationTime;
    }

    public function setReservationTime(string $ReservationTime): self
    {
        $this->ReservationTime = $ReservationTime;

        return $this;
    }

    public function getNumberOfPersons(): ?int
    {
        return $this->NumberOfPersons;
    }

    public function setNumberOfPersons(int $NumberOfPersons): self
    {
        $this->NumberOfPersons = $NumberOfPersons;

        return $this;
    }
}
