<?php

namespace Tests\Unit\UI\Http;


use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\UI\Http\InternalServerErrorResponse;

class InternalServerErrorResponseTest extends TestCase
{

    /**
     * @test
     * @covers \Zizoo\BoatsService\UI\Http\InternalServerErrorResponse::jsonSerialize
     */
    public function ensureCorrectJsonReturned()
    {
        $response = new InternalServerErrorResponse();
        $expected = [
            'error' => [
                'message' => '500 Internal Server Error',
                'code' => 500
            ]
        ];

        $this->assertJsonStringEqualsJsonString(json_encode($expected), json_encode($response));
    }
}