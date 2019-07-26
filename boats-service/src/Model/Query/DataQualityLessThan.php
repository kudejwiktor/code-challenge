<?php


namespace Zizoo\BoatsService\Model\Query;


use Zizoo\BoatsService\Model\Boat;

class DataQualityLessThan extends Query
{
    /**
     * @var int
     */
    private $dataQuality;

    public function __construct(int $dataQuality)
    {
        $this->dataQuality = $dataQuality;
    }

    /**
     * @param Boat $boat
     * @return bool
     */
    public function __invoke(Boat $boat): bool
    {
        return $boat->getDataQuality() <= $this->dataQuality;
    }
}