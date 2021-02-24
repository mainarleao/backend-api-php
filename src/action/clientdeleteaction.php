<?php

namespace App\Action;

use App\Domain\Client\Service\ClientDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientDeleteAction
{
  private $clientDelete;

  public function __construct(ClientDelete $clientDelete)
  {
    $this->clientDelete = $clientDelete;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args = []
  ): ResponseInterface {

    $clientId = (int) $args['id'];
    $rowCount = $this->clientDelete->deleteById($clientId);

    $result = [
      'success' => $rowCount == 1 ? true : false
    ];

    $response->getBody()->write((string)json_encode($result));

    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
  }
}