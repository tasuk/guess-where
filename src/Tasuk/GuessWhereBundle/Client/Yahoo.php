<?php

namespace Tasuk\GuessWhereBundle\Client;

use Tasuk\GuessWhereBundle\Factory\LocationServiceInterface;

/**
 * Communication with Yahoo API
 */
class Yahoo extends Client implements LocationServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCountryCode($woeid)
    {
        $request = $this->guzzleClient->get($woeid);
        $request->getQuery()->set('appid', $this->apiKey);

        return $request->send()->xml()->country['code'];
    }
}
