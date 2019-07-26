<?php

namespace Tests\Unit\Model;


use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\Model\BoatsCollection;
use Zizoo\BoatsService\Model\BoatsResponse;

class BoatsResponseTest extends TestCase
{
    /**
     * @test
     * @covers \Zizoo\BoatsService\Model\BoatsResponse::jsonSerialize
     */
    public function ensureCorrectResponseReturned()
    {
        $skip = 1;
        $take = 25;
        $response = new BoatsResponse(new BoatsCollection(), $skip, $take);

        $expected = [
            'items' => [],
            'count' => 0,
            'total' => 0,
            'skip' => $skip,
            'take' => $take
        ];

        $this->assertJsonStringEqualsJsonString(json_encode($expected), json_encode($response));
    }
}