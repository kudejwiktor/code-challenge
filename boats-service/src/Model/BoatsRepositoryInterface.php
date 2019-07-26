<?php

namespace Zizoo\BoatsService\Model;

interface BoatsRepositoryInterface
{
    public function all(): BoatsCollection;
}