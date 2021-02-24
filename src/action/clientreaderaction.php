<?php

namespace App\Action;

use App\Domain\Client\Service\ClientReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientReaderAction
{
  private $clientReader;

  public function __construct(ClientReader $clientReader)
  {
    $this->clientReader = $clientReader;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args = []
  ): ResponseInterface {

    $clientId = (int) $args['id'];
    $client = $this->clientReader->getClientById($clientId);

    $result = [
      'client_id' => $client->id,
      'first_name' => $client->firstName,
      'last_name' => $client->lastName,
      'email' => $client->email,
      'phone_number' => $client->phoneNumber,
      'cellphone_number' => $client->cellphoneNumber,
      'birthdate' => $client->birthdate,
      'CPF' => $client->cpf,
      'RG' => $client->rg,
    ];



    $response->getBody()->write((string)json_encode($result));

    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
  }
}