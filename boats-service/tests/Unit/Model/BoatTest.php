<?php

namespace Tests\Unit\Model;


use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\Model\Boat;

class BoatTest extends TestCase
{
    /**
     * @test
     * @covers \Zizoo\BoatsService\Model\Boat::getId
     * @covers \Zizoo\BoatsService\Model\Boat::getName
     * @covers \Zizoo\BoatsService\Model\Boat::getAge
     * @covers \Zizoo\BoatsService\Model\Boat::getBathrooms
     * @covers \Zizoo\BoatsService\Model\Boat::getCabins
     * @covers \Zizoo\BoatsService\Model\Boat::getDataQuality
     * @covers \Zizoo\BoatsService\Model\Boat::getLength
     * @covers \Zizoo\BoatsService\Model\Boat::isMmk
     * @covers \Zizoo\BoatsService\Model\Boat::getNrGuests
     * @covers \Zizoo\BoatsService\Model\Boat::getRating
     * @covers \Zizoo\BoatsService\Model\Boat::getReviewRating
     * @covers \Zizoo\BoatsService\Model\Boat::getReviewCount
     * @covers \Zizoo\BoatsService\Model\Boat::getType
     * @covers \Zizoo\BoatsService\Model\Boat::getYear
     * @covers \Zizoo\BoatsService\Model\Boat::getLocation
     */
    public function ensureGettersReturnsCorrectTypes()
    {
        $boat = new Boat(
        '123abc',
        'name',
        12,
        5,
        1,
        12,
        27,
        true,
        12,
        1,
        1,
        4.5,
        'motorboat',
        1999,
        'Berlin'
        );

        $this->assertIsString($boat->getId());
        $this->assertIsString($boat->getName());
        $this->assertIsInt($boat->getAge());
        $this->assertIsInt($boat->getBathrooms());
        $this->assertIsInt($boat->getCabins());
        $this->assertIsInt($boat->getDataQuality());
        $this->assertIsFloat($boat->getLength());
        $this->assertIsBool($boat->isMmk());
        $this->assertIsInt($boat->getNrGuests());
        $this->assertIsInt($boat->getRating());
        $this->assertIsInt($boat->getReviewCount());
        $this->assertIsFloat($boat->getReviewRating());
        $this->assertIsString($boat->getType());
        $this->assertIsInt($boat->getYear());
        $this->assertIsString($boat->getLocation());
    }
}