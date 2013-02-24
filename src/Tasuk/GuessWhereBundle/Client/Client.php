<?php

namespace Tasuk\GuessWhereBundle\Client;

use Guzzle\Http\ClientInterface;

/**
 * Base API client
 */
class Client
{
    protected $guzzleClient;
    protected $apiKey;

    /**
     * @param Guzzle\Http\ClientInterface $guzzleClient Guzzle client
     * @param string                      $baseUrl      Request URL
     * @param string                      $apiKey       API key
     */
    public function __construct(ClientInterface $guzzleClient, $baseUrl, $apiKey)
    {
        $this->guzzleClient = $guzzleClient->setBaseUrl($baseUrl);
        $this->apiKey = $apiKey;
    }
}
