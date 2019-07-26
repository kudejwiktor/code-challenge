<?php

namespace Zizoo\BoatsService\Model;

class Boat implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var int
     */
    private $bathrooms;

    /**
     * @var int
     */
    private $cabins;

    /**
     * @var int
     */
    private $data_quality;

    /**
     * @var float
     */
    private $length;

    /**
     * @var bool
     */
    private $mmk;

    /**
     * @var int
     */
    private $nr_guests;

    /**
     * @var int
     */
    private $rating;

    /**
     * @var int
     */
    private $review_count;

    /**
     * @var float
     */
    private $review_rating;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $year;

    /**
     * @var string
     */
    private $location;


    public function __construct(
        string $id,
        string $name,
        int $age,
        int $bathrooms,
        int $cabins,
        int $data_quality,
        float $length,
        bool $mmk,
        ?int $nr_guests,
        int $rating,
        int $review_count,
        float $review_rating,
        string $type,
        int $year,
        string $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->bathrooms = $bathrooms;
        $this->cabins = $cabins;
        $this->data_quality = $data_quality;
        $this->length = $length;
        $this->mmk = $mmk;
        $this->nr_guests = $nr_guests;
        $this->rating = $rating;
        $this->review_count = $review_count;
        $this->review_rating = $review_rating;
        $this->type = $type;
        $this->year = $year;
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getBathrooms(): int
    {
        return $this->bathrooms;
    }

    /**
     * @return int
     */
    public function getCabins(): int
    {
        return $this->cabins;
    }

    /**
     * @return int
     */
    public function getDataQuality(): int
    {
        return $this->data_quality;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return bool
     */
    public function isMmk(): bool
    {
        return $this->mmk;
    }

    /**
     * @return int
     */
    public function getNrGuests(): int
    {
        return $this->nr_guests;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @return int
     */
    public function getReviewCount(): int
    {
        return $this->review_count;
    }

    /**
     * @return float
     */
    public function getReviewRating(): float
    {
        return $this->review_rating;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'bathrooms' => $this->bathrooms,
            'cabins' => $this->cabins,
            'data_quality' => $this->data_quality,
            'length' => $this->length,
            'mmk' => $this->mmk,
            'nr_guests' => $this->nr_guests,
            'rating' => $this->rating,
            'review_count' => $this->review_count,
            'review_rating' => $this->review_rating,
            'type' => $this->type,
            'year' => $this->year,
            'location' => $this->location,
        ];
    }
}