<?php

namespace Zizoo\BoatsService\Infrastructure\Persistence\Boat;

class BoatsProvider
{
    private const dataPath = __DIR__ . '/../../../../Boats/boat_data.json';

    /**
     * @return mixed
     */
    public function all()
    {
        if (!is_file(self::dataPath)) {
            throw new BoatsProviderException();
        }
        $strJsonFileContents = file_get_contents(self::dataPath);

        return json_decode($strJsonFileContents, true);
    }

    /**
     * @param string $id
     * @return mixed|null
     * @throws BoatsProviderException
     */
    public function findById(string $id)
    {
        $boats = $this->all();
        foreach ($boats as $boat) {
            if ($boat['id'] === $id) {
                return $boat;
            }
        }

        return null;
    }
}