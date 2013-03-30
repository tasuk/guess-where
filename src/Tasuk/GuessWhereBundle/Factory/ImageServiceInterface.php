<?php

namespace Tasuk\GuessWhereBundle\Factory;

/**
 * Image service interface
 */
interface ImageServiceInterface
{
    /**
     * Get most popular photo places
     *
     * @param int $type
     *
     * @return Guzzle\Http\Message\Response
     */
    public function getTopPlaces($type);

    /**
     * Get most popular photos for a place
     *
     * @param int $woeid Location WOEID
     *
     * @return Guzzle\Http\Message\Response
     */
    public function getTopPhotos($woeid);
}
