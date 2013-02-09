<?php

namespace Tasuk\GuessWhereBundle\Factory;

/**
 * Location service interface
 */
interface LocationServiceInterface
{
    /**
     * Get country code from WOEID
     *
     * @param string $woeid Yahoo Location WOEID
     *
     * @return Guzzle\Http\Message\Response
     */
    public function getCountryCode($woeid);
}
