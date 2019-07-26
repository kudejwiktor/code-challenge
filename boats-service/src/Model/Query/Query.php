<?php

namespace Zizoo\BoatsService\Model\Query;

use Zizoo\BoatsService\Model\Boat;

abstract class Query
{
    abstract public function __invoke(Boat $boat): bool;
}
