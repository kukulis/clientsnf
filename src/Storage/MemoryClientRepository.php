<?php

namespace Lt\Regitra\Storage;

use Lt\Regitra\Data\Client;

class MemoryClientRepository implements ClientRepository
{
    /**
     * @var Client[]
     */
    private array $clients = [];

    public function add(Client $client): int
    {
        $this->clients[] = $client;

        return count($this->clients);
    }

    public function clear(): void
    {
        $this->clients = [];
    }

    /**
     * @return Client[]
     */
    public function getAll(): array
    {
        return $this->clients;
    }


    public static function loadRepository(string $file): MemoryClientRepository
    {
        if ( !file_exists($file) ) {
            return new MemoryClientRepository();
        }
        $repositoryContent = file_get_contents($file);

        return unserialize($repositoryContent);
    }

    public static function storeRepository(string $file, MemoryClientRepository $repository): void
    {
        file_put_contents($file, serialize($repository));
    }
}