<?php

namespace Zizoo\BoatsService\Infrastructure\Persistence\Boat;

use Zizoo\BoatsService\Model\{
    Boat,
    BoatFactory,
    BoatsCollection,
    BoatsRepositoryInterface,
    Query\Query
};
use Zizoo\BoatsService\Model\Exceptions\{
    BoatException,
    BoatNotFoundException
};

class BoatsRepository implements BoatsRepositoryInterface
{
    /**
     * @var BoatsProvider
     */
    private $boatsProvider;

    public function __construct(BoatsProvider $boatsProvider)
    {
        $this->boatsProvider = $boatsProvider;
    }

    /**
     * @param string $id
     * @return Boat
     * @throws BoatNotFoundException
     * @throws BoatException
     */
    public function findById(string $id)
    {
        try {
            $rawBoats = $this->boatsProvider->findById($id);
        }catch (BoatsProviderException $e) {
            throw new BoatException('Can not instantiate Boat');
        }

        if (!$rawBoats) {
            throw BoatNotFoundException::forId($id);
        }

        return BoatFactory::fromRaw($rawBoats);
    }

    /**
     * @return BoatsCollection
     * @throws BoatException
     */
    public function all(): BoatsCollection
    {
        $boats = new BoatsCollection();
        try {
            $rawBoats = $this->boatsProvider->all();
            foreach ($rawBoats as $rawBoat) {
                $boats->set(BoatFactory::fromRaw($rawBoat));
            }
        } catch (BoatsProviderException $e) {
            throw new BoatException('Can not instantiate Boat');
        }

        return $boats;
    }

    /**
     * @param $queries Query[]
     * @return BoatsCollection
     * @throws BoatException
     */
    public function findByQuery(array $queries): BoatsCollection
    {
        $boats = $this->all();

        foreach ($queries as $query) {
            $boats = $boats->filter($query);
        }

        return $boats;
    }
}