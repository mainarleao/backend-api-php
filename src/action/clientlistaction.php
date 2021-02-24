<?php

namespace App\Action;

use App\Domain\Client\Service\ClientList;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientlistAction
{
  private $clientList;

  public function __construct(ClientList $clientList)
  {
    $this->clientList = $clientList;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
  ): ResponseInterface {

    $clients = $this->clientList->findAll();

    $result = [
      'client' => $clients
    ];

    $response->getBody()->write((string)json_encode($result));

    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
  }
}