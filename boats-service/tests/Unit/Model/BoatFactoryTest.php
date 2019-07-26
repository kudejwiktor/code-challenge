<?php

namespace Tests\Unit\Model;


use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\Model\Boat;
use Zizoo\BoatsService\Model\BoatFactory;

class BoatFactoryTest extends TestCase
{
    private $mockRawData = [
        'id' => '123abc',
        'name' => 'name',
        'age' => 12,
        'bathrooms' => 5,
        'cabins' => 1,
        'data_quality' => 12,
        'length' => 27,
        'mmk' => true,
        'nr_guests' => 12,
        'rating' => 1,
        'review_count' => 1,
        'review_rating' => 4.5,
        'type' => 'motorboat',
        'year' => 1999,
        'location' => 'Berlin'
    ];

    /**
     * @test
     * @covers \Zizoo\BoatsService\Model\BoatFactory::fromRaw
     */
    public function ensureFactoryReturnsCorrectInstance()
    {
        $boat = BoatFactory::fromRaw($this->mockRawData);

        $this->assertInstanceOf(Boat::class, $boat);
    }
}