<?php

namespace Tasuk\GuessWhereBundle\Client;

use Guzzle\Http\ClientInterface;

class Client
{
    protected $guzzleClient;
    protected $apiKey;

    /**
     * @param Guzzle\Http\ClientInterface $guzzleClient
     * @param string                      $baseUrl
     * @param string                      $apiKey
     */
    public function __construct(ClientInterface $guzzleClient, $baseUrl, $apiKey)
    {
        $this->guzzleClient = $guzzleClient->setBaseUrl($baseUrl);
        $this->apiKey = $apiKey;
    }
}

