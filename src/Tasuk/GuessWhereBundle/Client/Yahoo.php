<?php

namespace Tasuk\GuessWhereBundle\Client;

use Guzzle\Http\ClientInterface;

/**
 * Communication with Yahoo API
 */
class Yahoo extends Client
{
    /**
     * Get location details from WOEID
     *
     * @param string $woeid Yahoo Location WOEID
     *
     * @return Guzzle\Http\Message\Response
     */
    public function getPlace($woeid)
    {
        $request = $this->guzzleClient->get($woeid);
        $request->getQuery()->set('appid', $this->apiKey);

        return $request->send();
    }
}
