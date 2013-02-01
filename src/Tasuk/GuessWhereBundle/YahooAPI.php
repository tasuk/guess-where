<?php

namespace Tasuk\GuessWhereBundle;

use Guzzle\Http\ClientInterface;

class YahooAPI
{
    private $guzzleClient;
    private $apiKey;

    /**
     * @param Guzzle\Http\ClientInterface $guzzleClient
     * @param string                      $apiKey
     */
    public function __construct(ClientInterface $guzzleClient, $apiKey)
    {
        $this->guzzleClient = $guzzleClient;
        $this->apiKey = $apiKey;
    }

    /**
     * Get location details from WOEID
     *
     * @param string $woeid Yahoo Location WOEID
     *
     * @return SimpleXML
     */
    public function getPlace($woeid)
    {
        $request = $this->guzzleClient->get($woeid);
        $request->getQuery()->set('appid', $this->apiKey);

        return $request->send()->xml();
    }
}
