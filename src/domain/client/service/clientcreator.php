<?php

namespace App\Domain\Client\Service;

use App\Domain\Client\Repository\ClientCreatorRepository;
use App\Exception\ValidationException;

final class ClientCreator
{
  private $repository;

  public function __construct(ClientCreatorRepository $repository)
  {
    $this->repository = $repository;
  }

  public function createClient(array $data):int
  {
    $this->validateNewClient($data);

    $clientId = $this->repository->insertClient($data);

    return $clientId;
  }

  private function validateNewClient(array $data): void
  {
    $errors = [];
  }
}