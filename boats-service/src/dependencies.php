<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    $container['boat.repository'] = function () {
        $boatsProvider = new \Zizoo\BoatsService\Infrastructure\Persistence\Boat\BoatsProvider();
        return new \Zizoo\BoatsService\Infrastructure\Persistence\Boat\BoatsRepository($boatsProvider);
    };
};
