<?php

namespace App\Domain\Client\Repository;

use PDO;

class ClientUpdateRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function updateClient(array $client):int
  {
    $row = [
      'id' => $client['id'],
      'first_name' => $client['first_name'],
      'last_name' => $client['last_name'],
      'email' => $client['email'],
      'phone_number' => $client['phone_number'],
      'cellphone_number' => $client['celcellphone_numberlphone'],
      'birthdate' => $client['birthdate'],
      'CPF' => $client['CPF'],
      'RG' => $client['RG']
    ];

    $sql = "UPDATE client SET
            first_name=:first_name,
            last_name=:last_name,
            email=:email,
            phone_number=:phone_number,
            cellphone_number=:cellphone_number,
            birthdate=:birthdate,
            CPF=:CPF,
            RG=:RG WHERE id=:id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute($row);

    return (int) $statement->rowCount();
  }
}