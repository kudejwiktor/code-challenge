<?php


namespace Zizoo\BoatsService\Infrastructure\Persistence\Boat;


class BoatsProviderException extends \RuntimeException
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Could not retrieve data from provider", 0, $previous);
    }
}