<?php

namespace Lt\Regitra\Storage;

use Lt\Regitra\Data\Client;

interface ClientRepository
{
    public function add(Client $client): int;
    public function clear(): void;

    /**
     * @return Client[]
     */
    public function getAll() : array;
}