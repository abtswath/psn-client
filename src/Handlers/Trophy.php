<?php

namespace Abtswath\PSNClient\Handlers;

use Abtswath\PSNClient\Exceptions\HttpRequestFailedException;
use Abtswath\PSNClient\Response\TrophyEarnedResponse;
use Abtswath\PSNClient\Response\TrophyResponse;
use Abtswath\PSNClient\Traits\WithToken;
use GuzzleHttp\Exception\GuzzleException;

class Trophy {

    use WithToken;

    const TROPHIES_URI = 'trophy/v1/npCommunicationIds/%s/trophyGroups/%s/trophies';

    const EARNED_URI = 'trophy/v1/users/%s/npCommunicationIds/%s/trophyGroups/%s/trophies';

    /**
     * @throws HttpRequestFailedException
     */
    public function trophies(string $npCommunicationId, string $trophyGroupId = 'all', $npServiceName = 'trophy', $offset = 0, $limit = null): TrophyResponse {
        try {
            $response = $this->get(
                sprintf(self::TROPHIES_URI, $npCommunicationId, $trophyGroupId),
                [
                    'query' => [
                        'npServiceName' => $npServiceName,
                        'offset' => $offset,
                        'limit' => $limit
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        return new TrophyResponse($response->getBody()->json());
    }

    /**
     * @throws HttpRequestFailedException
     */
    public function earned(string $npCommunicationId, string $trophyGroupId = 'all', string $accountId = 'me', $npServiceName = 'trophy', $offset = 0, $limit = null): TrophyEarnedResponse {
        try {
            $response = $this->get(
                sprintf(self::EARNED_URI, $accountId, $npCommunicationId, $trophyGroupId),
                [
                    'query' => [
                        'npServiceName' => $npServiceName,
                        'offset' => $offset,
                        'limit' => $limit
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        return new TrophyEarnedResponse($response->getBody()->json());
    }

}
