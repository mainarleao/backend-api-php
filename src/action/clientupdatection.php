<?php

namespace App\Action;

use App\Domain\Client\Service\ClientUpdate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientUpdateAction
{
  private $clientUpdate;

  public function __construct(ClientUpdate $clientUpdate)
  {
    $this->clientUpdate = $clientUpdate;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
  ): ResponseInterface {

    $data = (array) $request->getParsedBody();

    $rowCount = $this->clientUpdate->updateClient($data);

    $result = [
      'success' => $rowCount == 1 ? true : false
    ];

    $response->getBody()->write((string)json_encode($result));

    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
  }
}