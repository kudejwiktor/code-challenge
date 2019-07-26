<?php


namespace Zizoo\BoatsService\UI\Http\Actions;


use Slim\Container;

class DefaultController
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container  $container)
    {
        $this->container = $container;
    }
}