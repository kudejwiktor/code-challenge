<?php


namespace Zizoo\BoatsService\UI\Http\Actions;


use Slim\Http\{Request, Response};
use Zizoo\BoatsService\Model\Exceptions\BoatException;
use Zizoo\BoatsService\Model\BoatsCollection;
use Zizoo\BoatsService\Model\BoatsResponse;
use Zizoo\BoatsService\Model\Query\{AgeLessThan,
    AgeMoreThan,
    BathroomLessThan,
    BathroomsMoreThan,
    CabinsLessThan,
    CabinsMoreThan,
    DataQualityLessThan,
    DataQualityMoreThan,
    LengthLessThan,
    LengthMoreThan,
    LocationEquals,
    MmkFalse,
    MmkTrue,
    NameEquals,
    RatingLessThan,
    RatingMoreThan,
    ReviewCountLessThan,
    ReviewCountMoreThan,
    TypeEquals,
    YearLessThan,
    YearMoreThan
};
use Zizoo\BoatsService\UI\Http\InternalServerErrorResponse;


class ListBoats extends DefaultController
{

    public function __invoke(Request $request, Response $response)
    {
        $skip = $request->getParam('skip', 0);
        $take = $request->getParam('take', 20);

        try {
            /**
             * @var $boats BoatsCollection
             */
            $boats = $this->container->get('boat.repository')->findByQuery($this->getQuery($request));
        } catch (BoatException $e) {
            return $response->withJson(new InternalServerErrorResponse());
        }

        $boatsResponse = new BoatsResponse(
            $boats,
            $skip,
            $take
        );

        return $response->withJson($boatsResponse, 200)
            ->withHeader('Cache-Control', 'public, s-maxage=120')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getQuery(Request $request)
    {
        $filters = [];
        $params = $request->getParams();

        $minAge = $params['min_age'];
        $maxAge = $params['max_age'];
        if ($minAge) {
            $filters[] = new AgeMoreThan($minAge);
        }
        if ($maxAge) {
            $filters[] = new AgeLessThan($maxAge);
        }

        $minBathrooms = $params['min_bathrooms'];
        $maxBathrooms = $params['max_bathrooms'];
        if ($minBathrooms) {
            $filters[] = new BathroomsMoreThan($minBathrooms);
        }
        if ($maxBathrooms) {
            $filters[] = new BathroomLessThan($maxBathrooms);
        }

        $minCabins = $params['min_cabins'];
        $maxCabins = $params['max_cabins'];
        if ($minCabins) {
            $filters[] = new CabinsMoreThan($minCabins);
        }
        if ($maxCabins) {
            $filters[] = new CabinsLessThan($maxCabins);
        }

        $minDataQuality = $params['min_data_quality'];
        $maxDataQuality = $params['max_data_quality'];
        if ($minDataQuality) {
            $filters[] = new DataQualityMoreThan($minDataQuality);
        }
        if ($maxDataQuality) {
            $filters[] = new DataQualityLessThan($maxDataQuality);
        }

        $minLength = $params['min_length'];
        $maxLength = $params['max_length'];
        if ($minLength) {
            $filters[] = new LengthMoreThan($minLength);
        }
        if ($maxLength) {
            $filters[] = new LengthLessThan($maxLength);
        }

        $minRating = $params['min_rating'];
        $maxRating = $params['max_rating'];
        if ($minRating) {
            $filters[] = new RatingMoreThan($minRating);
        }
        if ($maxRating) {
            $filters[] = new RatingLessThan($maxRating);
        }

        $minReviewCount = $params['min_review_count'];
        $maxReviewCount = $params['max_review_count'];
        if ($minReviewCount) {
            $filters[] = new ReviewCountMoreThan($minReviewCount);
        }
        if ($maxReviewCount) {
            $filters[] = new ReviewCountLessThan($maxReviewCount);
        }

        $minYear = $params['min_year'];
        $maxYear = $params['max_year'];
        if ($minYear) {
            $filters[] = new YearMoreThan($minYear);
        }
        if ($maxYear) {
            $filters[] = new YearLessThan($maxYear);
        }

        $location = $params['location'];
        if ($location) {
            $filters[] = new LocationEquals($location);
        }

        $name = $params['name'];
        if ($name) {
            $filters[] = new NameEquals($name);
        }

        $type = $params['type'];
        if ($type) {
            $filters[] = new TypeEquals($type);
        }

        $mmk = isset($params['mmk']) ? (boolean)$params['mmk'] : null;

        if ($mmk === true) {
            $filters[] = new MmkTrue();
        } elseif (false === $mmk) {
            $filters[] = new MmkFalse();
        }

        return $filters;
    }
}