<?php

namespace App\Domain\Client\Service;

use App\Domain\Client\Repository\ClientListRepository;

final class ClientList
{
  private $repository;

  public function __construct(ClientListRepository $repository)
  {
    $this->repository = $repository;
  }

  public function findAll()
  {
    $clients = $this->repository->findAll();
    return $clients;
  }
}