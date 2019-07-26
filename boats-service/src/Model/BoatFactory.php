<?php


namespace Zizoo\BoatsService\Model;


class BoatFactory
{
    public static function fromRaw(array $data)
    {
        return new Boat(
            $data['id'],
            $data['name'],
            $data['age'],
            $data['bathrooms'],
            $data['cabins'],
            $data['data_quality'],
            $data['length'],
            (bool)$data['mmk'],
            $data['nr_guests'] ?? null,
            $data['rating'],
            $data['review_count'],
            $data['review_rating'],
            $data['type'],
            $data['year'],
            $data['location'],
            );
    }
}