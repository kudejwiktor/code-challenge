<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class ReviewCountLessThan extends Query
{
    /**
     * @var float
     */
    private $reviewCount;

    public function __construct(float $reviewCount)
    {
        $this->reviewCount = $reviewCount;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getReviewCount() <= $this->reviewCount;
    }
}