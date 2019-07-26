<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class AgeMoreThan extends Query
{
    /**
     * @var int
     */
    private $age;

    public function __construct(int $age)
    {
        $this->age = $age;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getAge() >= $this->age;
    }
}