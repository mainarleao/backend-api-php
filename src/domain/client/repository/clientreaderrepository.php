<?php

namespace App\Domain\Client\Repository;

use PDO;
use App\Domain\Client\Model\Client;
use DomainException;

class ClientReaderRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function getClientById(int $clientId): Client
  {

    $sql = "SELECT id, first_name, last_name, email, phone_number, cellphone_number, birthdate, CPF, RG FROM client WHERE id = :id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' => $clientId]);

    $row = $statement->fetch();

    $client = new Client();
    $client->id = (int) $row['id'];
    $client->firstName = (string) $row['first_name'];
    $client->lastName = (string) $row['last_name'];
    $client->email = (string) $row['email'];
    $client->phoneNumber = (string) $row['phone_number'];
    $client->cellphoneNumber = (string) $row['cellphone_number'];
    $client->birthdate = (string) $row['birthdate'];
    $client->cpf = (int) $row['CPF'];
    $client->rg = (string) $row['RG'];

    return $client;
  }
}