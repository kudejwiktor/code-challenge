<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class BathroomsMoreThan extends Query
{
    /**
     * @var int
     */
    private $bathrooms;

    public function __construct(int $bathrooms)
    {
        $this->bathrooms = $bathrooms;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getBathrooms() >= $this->bathrooms;
    }
}