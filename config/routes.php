<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return function (App $app) {

    $app->get('/', function (
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });

    $app->post('/client',\App\Action\ClientCreateAction::class);

    $app->get('/client',\App\Action\ClientlistAction::class);

    $app->get('/client/{id}',\App\Action\ClientReaderAction::class);

    $app->put('/client',\App\Action\ClientUpdateAction::class);

    $app->delete('/client/{id}',\App\Action\ClientDeleteAction::class);
};
