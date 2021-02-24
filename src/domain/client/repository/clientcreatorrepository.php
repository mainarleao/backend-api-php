<?php

namespace App\Domain\Client\Repository;

use PDO;

class ClientCreatorRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function insertClient( array $client):int
  {
    $row = [
      'first_name' => $client['first_name'],
      'last_name' => $client['last_name'],
      'email' => $client['email'],
      'phone_number' => $client['phone_number'],
      'cellphone_number' => $client['cellphone_number'],
      'birthdate' => $client['birthdate'],
      'CPF' => $client['CPF'],
      'RG' => $client['RG']
    ];

    $sql = "INSERT INTO client SET
            first_name=:first_name,
            last_name=:last_name,
            email=:email,
            phone_number=:phone_number,
            cellphone_number=:cellphone_number,
            birthdate=:birthdate,
            CPF=:CPF,
            RG=:RG;";

    $this->connection->prepare($sql)->execute($row);

    return (int) $this->connection->lastInsertId();
  }
}