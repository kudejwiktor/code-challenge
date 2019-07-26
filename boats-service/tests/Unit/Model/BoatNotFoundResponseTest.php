<?php


namespace Tests\Unit\Model;


use PHPUnit\Framework\TestCase;
use Zizoo\BoatsService\Model\BoatNotFoundResponse;

class BoatNotFoundResponseTest extends TestCase
{
    /**
     * @test
     * @covers \Zizoo\BoatsService\Model\BoatNotFoundResponse::jsonSerialize
     */
    public function ensureCorrectJsonReturned()
    {
        $id = '123abc';
        $response = new BoatNotFoundResponse($id);
        $expected = [
            "error" => [
                "message" => "Boat could not be found",
                "code" => 404,
                "details" => [
                    "id" => $id
                ]
            ]
        ];

        $this->assertJsonStringEqualsJsonString(json_encode($expected), json_encode($response));
    }
}