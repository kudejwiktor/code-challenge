<?php

namespace Zizoo\BoatsService\Model;

class BoatsCollection
{
    /**
     * @var array
     */
    private $collection = [];

    /**
     * @param Boat $boat
     */
    public function set(Boat $boat): void
    {
        $this->collection[] = $boat;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        return $this->collection[$id];
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->collection;
    }

    /**
     * @param $class
     * @return BoatsCollection
     */
    public function filter($class): self
    {
        $new = clone $this;
        $collection = array_filter($new->collection, $class);

        $new->collection = $collection;

        return $new;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->collection);
    }

    /**
     * @param int $skip
     * @param int $take
     * @return BoatsCollection
     */
    public function paginate(int $skip, int $take)
    {
        $new = clone $this;
        $collection = [];
        $iteration = 0;

        foreach ($new->all() as $boat) {
            if($take === $skip) {//stop iteration when
                break;
            }

            if ($iteration++ < $skip) {//start from iteration
                continue;
            }

            $skip++;
            $collection[] = $boat;
        }

        $new->collection = $collection;
        return $new;
    }
}