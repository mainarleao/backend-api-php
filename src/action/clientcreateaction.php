<?php

namespace App\Action;

use App\Domain\Client\Service\ClientCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientCreateAction
{
  private $clientCreator;

  public function __construct(ClientCreator $clientCreator)
  {
    $this->clientCreator = $clientCreator;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
  ): ResponseInterface {

    $data = (array) $request->getParsedBody();

    $clientId = $this->clientCreator->createClient($data);

    $result = [
      'client_id' => $clientId
    ];

    $response->getBody()->write((string)json_encode($result));

    return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
  }
}