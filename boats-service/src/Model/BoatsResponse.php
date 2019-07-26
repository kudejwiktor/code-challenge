<?php


namespace Zizoo\BoatsService\Model;


class BoatsResponse implements \JsonSerializable
{
    /**
     * @var BoatsCollection
     */
    private $boatsCollection;

    /**
     * @var int
     */
    private $skip;

    /**
     * @var int
     */
    private $take;

    public function __construct(BoatsCollection $boatsCollection, int $skip, int $take)
    {
        $this->boatsCollection = $boatsCollection;
        $this->skip = $skip;
        $this->take = $take;
    }

    public function jsonSerialize()
    {
        /**
         * @var $paginatedResult BoatsCollection
         */
        $paginatedResult = $this->boatsCollection->paginate($this->skip, $this->skip + $this->take);
        $count = $paginatedResult->count();

        return [
            'items' => $paginatedResult->all(),
            'skip' => $this->skip,
            'take' => $this->take,
            'count' => $count,
            'total' => $this->boatsCollection->count()
        ];
    }
}