<?php

namespace Lt\Regitra\Data;

use DateTime;

class Client
{
    private string $name;
    private string $familyName;

    private DateTime $birthDate;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Client
    {
        $this->name = $name;
        return $this;
    }

    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    public function setFamilyName(string $familyName): Client
    {
        $this->familyName = $familyName;
        return $this;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate): Client
    {
        $this->birthDate = $birthDate;
        return $this;
    }
}