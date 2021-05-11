<?php

declare(strict_types=1);

$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/candidates', App\Controller\Candidates\GetAll::class);
$app->post('/candidates', App\Controller\Candidates\Create::class);
$app->get('/candidates/{id}', App\Controller\Candidates\GetOne::class);
$app->put('/candidates/{id}', App\Controller\Candidates\Update::class);
$app->delete('/candidates/{id}', App\Controller\Candidates\Delete::class);
