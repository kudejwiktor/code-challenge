<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class MmkFalse extends Query
{
    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return !$boat->isMmk();
    }
}