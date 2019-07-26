<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class LocationEquals extends Query
{
    /**
     * @var string
     */
    private $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getLocation() === $this->location;
    }
}