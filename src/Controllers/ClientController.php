<?php

namespace Lt\Regitra\Controllers;

use DateTime;
use Lt\Regitra\Data\Client;
use Lt\Regitra\Storage\ClientRepository;

class ClientController
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function add(array $request, string $body): void
    {
        $data = json_decode($body, true);
        if ( $data == null ) {
            $data = $request;
        }

        $client = self::arrayToClient($data);


        $count = $this->clientRepository->add($client);

        $insertedData = self::clientToArray($client);

        echo json_encode($insertedData);
    }

    public function clear(array $request): void
    {
        $this->clientRepository->clear();
        echo json_encode("cleared");
    }

    public function getAll(array $request): void
    {
        $clients = $this->clientRepository->getAll();

        $clientsArray = array_map(fn(Client $client) => self::clientToArray($client), $clients);
        echo json_encode($clientsArray);
    }


    public static function arrayToClient(array $data): Client
    {
        return (new Client())
            ->setName($data['name'])
            ->setFamilyName($data['family_name'])
            ->setBirthDate(new DateTime($data['birth_date']));
    }

    public static function clientToArray(Client $client): array
    {
        return [
            'name' => $client->getName(),
            'family_name' => $client->getFamilyName(),
            'birth_date' => $client->getBirthDate()->format('Y-m-d'),
        ];
    }
}