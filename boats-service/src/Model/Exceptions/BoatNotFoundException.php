<?php


namespace Zizoo\BoatsService\Model\Exceptions;


class BoatNotFoundException extends BoatException
{
    public static function forId(string $id)
    {
        return new static(
            sprintf('Boat (id = %d) not found', $id),
            self::NOT_FOUND_ERROR_CODE
        );
    }
}