<?php

namespace Test\Unit;

use DateTime;
use Lt\Regitra\Data\Client;
use Lt\Regitra\Storage\MemoryClientRepository;
use PHPUnit\Framework\TestCase;

class MemoryClientRepositoryTest extends TestCase
{
    public function testRepository()
    {
        $dataFile = __DIR__ . '/data.txt';
        // be sure initial file is empty or does not exist
        unlink($dataFile);

        $repository = MemoryClientRepository::loadRepository($dataFile);

        $repository->add(
            (new Client())
                ->setName('Jonas')
                ->setFamilyName('Jonaitis')
                ->setBirthDate(new DateTime('2001-02-03'))
        );

        MemoryClientRepository::storeRepository($dataFile, $repository);

        $repository2 = MemoryClientRepository::loadRepository($dataFile);

        $clients = $repository2->getAll();

        $expectedClients = [
            (new Client())
                ->setName('Jonas')
                ->setFamilyName('Jonaitis')
                ->setBirthDate(new DateTime('2001-02-03'))
        ];

        $this->assertEquals($expectedClients, $clients);

        $repository->add(
            (new Client())
                ->setName('Petras')
                ->setFamilyName('Petraitis')
                ->setBirthDate(new DateTime('2004-05-06'))
        );

        $expectedClients = [
            (new Client())
                ->setName('Jonas')
                ->setFamilyName('Jonaitis')
                ->setBirthDate(new DateTime('2001-02-03')),
            (new Client())
                ->setName('Petras')
                ->setFamilyName('Petraitis')
                ->setBirthDate(new DateTime('2004-05-06'))

        ];


        MemoryClientRepository::storeRepository($dataFile, $repository);

        $repository2 = MemoryClientRepository::loadRepository($dataFile);

        $clients = $repository2->getAll();
        $this->assertEquals($expectedClients, $clients);
    }

}