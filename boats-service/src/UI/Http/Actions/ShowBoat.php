<?php

namespace Zizoo\BoatsService\UI\Http\Actions;

use Slim\Http\{Request, Response};
use Zizoo\BoatsService\Infrastructure\Persistence\Boat\BoatsRepository;
use Zizoo\BoatsService\Model\BoatNotFoundResponse;
use Zizoo\BoatsService\Model\Exceptions\BoatException;
use Zizoo\BoatsService\Model\Exceptions\BoatNotFoundException;
use Zizoo\BoatsService\UI\Http\InternalServerErrorResponse;

class ShowBoat extends DefaultController
{
    public function __invoke(Request $request, Response $response)
    {
        /**
         * @var $boatRepository BoatsRepository
         */
        $boatRepository = $this->container->get('boat.repository');
        $id = $request->getAttribute('id');

        try {
            $boat = $boatRepository->findById($id);
        } catch (BoatNotFoundException $e) {
            return $response->withJson(new BoatNotFoundResponse($id), 404);
        } catch (BoatException $e) {
            return $response->withJson(new InternalServerErrorResponse(), 500);
        }

        return $response->withJson($boat, 200)
            ->withHeader('Cache-Control', 'public, s-maxage=120')
            ->withHeader('Access-Control-Allow-Origin', '*');
    }
}