<?php

namespace Tasuk\GuessWhereBundle\Client;

use Guzzle\Http\ClientInterface;

/**
 * Communication with Flickr API
 */
class Flickr extends Client
{
    const PLACE_TYPE_REGION = 8;
    const PLACE_TYPE_COUNTRY = 12;
    const CONTENT_PHOTOS_ONLY = 1;
    const SORT_BY_INTERESTINGNESS = "interestingness-desc";

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
            ->set('lang', 'en');

        return $request->send();
    }

    /**
     * Get top photos for place
     *
     * @param int    $woeid  Location WOEID
     * @param string $maxAge Max photo age, eg. "5 years"
     * @param int    $limit  Number of items to get
     *
     * @return Guzzle\Http\Message\Response
     */
    public function getTopPhotos($woeid, $maxAge, $limit)
    {
        $today = strtotime(date("Y-m-d"));
        $minUploadDate = strtotime('-' . $maxAge, $today);

        $request = $this->guzzleClient->get();
        $request->getQuery()
            ->set('api_key', $this->apiKey)
            ->set('method', 'flickr.photos.search')
            ->set('sort', self::SORT_BY_INTERESTINGNESS)
            ->set('content_type', self::CONTENT_PHOTOS_ONLY)
            ->set('woe_id', $woeid)
            ->set('min_upload_date', $minUploadDate)
            ->set('per_page', $limit);

        return $request->send();
    }
}
