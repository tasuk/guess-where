<?php

namespace Tasuk\GuessWhereBundle\Guzzle\Plugin\Cache;

use Guzzle\Plugin\Cache\CanCacheStrategyInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;

/**
 * Ignore headers when determining whether an HTTP request can be cached
 */
class AlwaysCanCacheStrategy implements CanCacheStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function canCacheRequest(RequestInterface $request)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function canCacheResponse(Response $response)
    {
        return true;
    }
}
