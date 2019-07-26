<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class YearLessThan extends Query
{
    /**
     * @var int
     */
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getYear() <= $this->year;
    }
}