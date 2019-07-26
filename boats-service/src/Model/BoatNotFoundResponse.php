<?php


namespace Zizoo\BoatsService\Model;


class BoatNotFoundResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function jsonSerialize()
    {
        return [
            'error' => [
                'message' => "Boat could not be found",
                'code' => 404,
                'details' => [
                    'id' => $this->id
                ]
            ]
        ];
    }
}