<?php

namespace Tests\Unit\Infrastructure\Persistence\Boat;

use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\Infrastructure\Persistence\Boat\{
    BoatsRepository,
    BoatsProvider
};
use Zizoo\BoatsService\Model\{
    BoatsCollection,
    Exceptions\BoatException,
    Exceptions\BoatNotFoundException,
    Query\LengthMoreThan
};

class BoatRepositoryTest extends TestCase
{
    /**
     * @test
     * @covers BoatsRepository::all
     */
    public function ensureAllReturnsCorrectInstance()
    {
        $provider = $this->mockBoatsProviderAllReturnArray();
        $repository = new BoatsRepository($provider);
        $result = $repository->all();

        $this->assertInstanceOf(BoatsCollection::class, $result);
    }

    /**
     * @test
     * @covers BoatsRepository::findByQuery
     */
    public function ensureFindByQueryReturnCorrectInstance()
    {
        $provider = $this->mockBoatsProviderAllReturnArray();
        $repository = new BoatsRepository($provider);
        $result = $repository->findByQuery([new LengthMoreThan(40)]);

        $this->assertInstanceOf(BoatsCollection::class, $result);
    }

    /**
     * @test
     * @covers BoatsRepository::findById
     */
    public function findByIdShouldThrowExceptionIfBoatNotFound()
    {
        $this->expectException(BoatNotFoundException::class);
        $provider = $this->mockBoatsProviderFindByIdReturnNull();

        $repository = new BoatsRepository($provider);
        $repository->findById('non-existing-id');
    }

    /**
     * @test
     * @covers \BoatsRepository::all
     */
    public function allShouldThrowBoatExceptionIfProviderFails()
    {
        $this->expectException(BoatException::class);
        $provider = $this->mockBoatsProviderAllThrowsBoatException();
        $repository = new BoatsRepository($provider);
        $repository->all();
    }

    private function mockBoatsProviderFindByIdReturnNull()
    {
        $provider = $this->getMockBuilder(BoatsProvider::class)->getMock();
        $provider->expects($this->once())->method('findById')->willReturn(null);

        return $provider;
    }

    private function mockBoatsProviderAllReturnArray()
    {
        $provider = $this->getMockBuilder(BoatsProvider::class)->getMock();
        $provider->expects($this->once())->method('all')->willReturn([]);

        return $provider;
    }

    private function mockBoatsProviderAllThrowsBoatException()
    {
        $provider = $this->getMockBuilder(BoatsProvider::class)->getMock();
        $provider->expects($this->once())->method('all')->willThrowException(new BoatException());

        return $provider;
    }
}