<?php

namespace App\Domain\Client\Service;

use App\Domain\Client\Repository\ClientUpdateRepository;
use App\Exception\ValidationException;

final class ClientUpdate
{
  private $repository;

  public function __construct(ClientUpdateRepository $repository)
  {
    $this->repository = $repository;
  }

  public function updateClient(array $data):int
  {
    $this->validateNewClient($data);

    $rowCount = $this->repository->updateClient($data);

    return $rowCount;
  }

  private function validateNewClient(array $data): void
  {
    $errors = [];
  }
}