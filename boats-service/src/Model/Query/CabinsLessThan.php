<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class CabinsLessThan extends Query
{
    /**
     * @var int
     */
    private $cabins;

    public function __construct(int $cabins)
    {
        $this->cabins = $cabins;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getCabins() <= $this->cabins;
    }
}