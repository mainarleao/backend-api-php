<?php

namespace App\Domain\Client\Service;

use App\Domain\Client\Repository\ClientDeleteRepository;
use App\Domain\Client\Model\Client;
use App\Exception\ValidationException;

final class ClientDelete
{
  private $repository;

  public function __construct(ClientDeleteRepository $repository)
  {
    $this->repository = $repository;
  }

  public function deleteById(int $clientId): int
  {
    if(empty($clientId)) {
      throw new ValidationException('Por favor insira o codigo do cliente');
    }

    $rowCount = $this->repository->deleteById($clientId);

    return $rowCount;
  }

}