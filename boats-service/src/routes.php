<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $app->get('/boats', \Zizoo\BoatsService\UI\Http\Actions\ListBoats::class);
    $app->get('/boat/{id}', \Zizoo\BoatsService\UI\Http\Actions\ShowBoat::class);
};
