<?php

namespace Lt\Regitra;

use Lt\Regitra\Controllers\ClientController;
use Lt\Regitra\Storage\ClientRepository;
use Lt\Regitra\Storage\MemoryClientRepository;

class Application
{
    private $storageFile = __DIR__ . '/../cache/data.txt';

    public function __construct() {

    }

    private ?MemoryClientRepository $clientRepository = null;

    public function getRepository() : ClientRepository {

        if ( $this->clientRepository === null ) {
            $this->clientRepository = MemoryClientRepository::loadRepository($this->storageFile);
        }

        return  $this->clientRepository;
    }

    public function getController() : ClientController
    {
        return new ClientController($this->getRepository());
    }

    public function finalize() {
        MemoryClientRepository::storeRepository($this->storageFile, $this->clientRepository);
    }

}