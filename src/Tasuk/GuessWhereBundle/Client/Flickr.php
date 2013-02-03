<?php

namespace Tasuk\GuessWhereBundle\Client;

use Guzzle\Http\ClientInterface;

class Flickr extends Client
{
    const PLACE_TYPE_REGION = 8;
    const PLACE_TYPE_COUNTRY = 12;

    /**
     * Get top photo places
     *
     * @param int $type Flickr's place type id
     *
     * @return Guzzle\Http\Message\Response
     */
    public function getTopPlaces($type = self::PLACE_TYPE_COUNTRY)
    {
        $request = $this->guzzleClient->get();
        $request->getQuery()
            ->set('api_key', $this->apiKey)
            ->set('method', 'flickr.places.getTopPlacesList')
            ->set('place_type_id', $type)
        ;

        return $request->send();
    }
}
