<?php

namespace Tests\Unit\Model;


use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\Model\BoatsCollection;
use Zizoo\BoatsService\Model\Query\LengthMoreThan;

class BoatsCollectionTest extends TestCase
{
    /**
     * @test
     * @covers \Zizoo\BoatsService\Model\BoatsCollection::filter
     */
    public function ensureFilterReturnsCorrectInstance()
    {
        $collection = new BoatsCollection();
        $result = $collection->filter(new LengthMoreThan(47));

        $this->assertInstanceOf(BoatsCollection::class, $result);
    }

    /**
     * @test
     * @covers \Zizoo\BoatsService\Model\BoatsCollection::paginate
     */
    public function ensurePaginateReturnsCorrectInstance()
    {
        $collection = new BoatsCollection();
        $result = $collection->paginate(1, 20);

        $this->assertInstanceOf(BoatsCollection::class, $result);
    }
}