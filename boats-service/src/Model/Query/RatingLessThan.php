<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class RatingLessThan extends Query
{
    /**
     * @var int
     */
    private $rating;

    public function __construct(int $rating)
    {
        $this->rating = $rating;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getRating() <= $this->rating;
    }
}