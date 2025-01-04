<?php

namespace Lt\Regitra\Controllers;

use DateTime;
use Exception;
use Lt\Regitra\Data\Client;
use Lt\Regitra\Exceptions\ValidationException;
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
        if( $data['name'] == null ) {
            throw new ValidationException('Vardas neturi būti tuščias');
        }

        if( $data['family_name'] == null ) {
            throw new ValidationException('Pavardė neturi būti tuščia');
        }

        if ($data['birth_date'] == null ) {
            throw new ValidationException('Nenurodyta gimimo data');
        }

        try {
            $date = new DateTime($data['birth_date']);
        } catch (Exception $e) {
            throw new ValidationException('Neteisinga gimimo data '.$data['birth_date']);
        }

        return (new Client())
            ->setName($data['name'])
            ->setFamilyName($data['family_name'])
            ->setBirthDate($date);
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