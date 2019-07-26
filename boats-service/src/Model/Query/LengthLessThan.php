<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class LengthLessThan extends Query
{
    /**
     * @var float
     */
    private $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getLength() <= $this->length;
    }
}