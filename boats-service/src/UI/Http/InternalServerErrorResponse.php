<?php

namespace Zizoo\BoatsService\UI\Http;

class InternalServerErrorResponse implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return [
            'error' => [
                'message' => '500 Internal Server Error',
                'code' => 500
            ]
        ];
    }
}