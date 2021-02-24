<?php

namespace App\Domain\Client\Service;

use App\Domain\Client\Repository\ClientReaderRepository;
use App\Domain\Client\Model\Client;
use App\Exception\ValidationException;

final class ClientReader
{
  private $repository;

  public function __construct(ClientReaderRepository $repository)
  {
    $this->repository = $repository;
  }

  public function getClientById(int $clientId): Client
  {
    if(empty($clientId)) {
      throw new ValidationException('Por favor Insira o codigo do cliente');
    }

    $client = $this->repository->getClientById($clientId);

    return $client;
  }

}