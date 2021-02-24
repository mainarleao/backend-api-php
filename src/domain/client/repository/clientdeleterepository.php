<?php

namespace App\Domain\Client\Repository;

use PDO;
use App\Domain\Client\Model\Client;
use DomainException;

class ClientDeleteRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function deleteById(int $clientId): int
  {

    $sql = "DELETE FROM client WHERE id=:id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' => $clientId]);

    return (int) $statement->rowCount();
  }
}