<?php

namespace Abtswath\PSNClient\Handlers;

use Abtswath\PSNClient\Contracts\UserInterface;
use Abtswath\PSNClient\Exceptions\HttpRequestFailedException;
use Abtswath\PSNClient\Response\GameListResponse;
use Abtswath\PSNClient\Response\TrophyTitlesResponse;
use Abtswath\PSNClient\Traits\WithToken;
use GuzzleHttp\Exception\GuzzleException;

class User implements UserInterface {

    use WithToken;

    const TROPHY_TITLES_URI = 'trophy/v1/users/%s/trophyTitles';

    const GAME_LIST_URI = 'gamelist/v2/users/%s/titles';

    /**
     * @throws HttpRequestFailedException
     */
    public function trophyTitles(string $accountId = 'me', int $offset = 0, int $limit = 100): TrophyTitlesResponse {
        try {
            $response = $this->get(sprintf(self::TROPHY_TITLES_URI, $accountId), [
                'query' => [
                    'limit' => $limit,
                    'offset' => $offset
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        return new TrophyTitlesResponse($response->getBody()->json());
    }

    /**
     * @throws HttpRequestFailedException
     */
    public function gameList(string $accountId = 'me', int $offset = 0, int $limit = 100): GameListResponse {
        try {
            $response = $this->get(sprintf(self::GAME_LIST_URI, $accountId), [
                'query' => [
                    'limit' => $limit,
                    'offset' => $offset
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        return new GameListResponse($response->getBody()->json());
    }

}
