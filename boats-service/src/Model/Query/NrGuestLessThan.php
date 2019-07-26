<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class NrGuestLessThan extends Query
{
    /**
     * @var int
     */
    private $nrGuests;

    public function __construct(int $nrGuests)
    {
        $this->nrGuests = $nrGuests;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getNrGuests() <= $this->nrGuests;
    }
}