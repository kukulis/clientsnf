<?php

namespace Lt\Regitra\Controllers;

use Lt\Regitra\Storage\ClientRepository;

class ClientController
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function add(array $request): void {
//        return $this->clientRepository->add();
        echo "TODO add";
    }
    public function clear(array $request): void {
//        return $this->clientRepository->add();
        echo "TODO clear";
    }
    public function getAll(array $request): void {
//        return $this->clientRepository->add();
        echo "TODO get-all";
    }


}