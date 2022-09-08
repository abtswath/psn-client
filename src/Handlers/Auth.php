<?php

namespace Abtswath\PSNClient\Handlers;

use Abtswath\PSNClient\Constants;
use Abtswath\PSNClient\Models\AuthToken;
use Abtswath\PSNClient\Contracts\AuthInterface;
use Abtswath\PSNClient\Exceptions\AuthorizeFailedException;
use Abtswath\PSNClient\Exceptions\HttpRequestFailedException;
use Abtswath\PSNClient\Exceptions\MissingCodeException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Auth implements AuthInterface {

    const AUTHORIZE_URI = 'https://ca.account.sony.com/api/authz/v3/oauth/authorize';

    const TOKEN_URI = 'https://ca.account.sony.com/api/authz/v3/oauth/token';

    private const REDIRECT_URI = 'com.playstation.PlayStationApp://redirect';

    private const RESPONSE_TYPE = 'code';

    private const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    private const GRANT_TYPE_REFRESH_TOKEN = 'refresh_token';

    private const TOKEN_FORMAT = 'jwt';

    private Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    /**
     * @throws MissingCodeException
     * @throws AuthorizeFailedException
     * @throws HttpRequestFailedException
     */
    public function login(string $npsso): AuthToken {
        $code = $this->authorize($npsso);
        try {
            $response = $this->client->post(self::TOKEN_URI, [
                'form_params' => [
                    'code' => $code,
                    'redirect_uri' => self::REDIRECT_URI,
                    'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE,
                    'token_format' => self::TOKEN_FORMAT
                ],
                'headers' => [
                    'Authorization' => 'Basic ' . Constants::AUTHORIZATION
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        return new AuthToken($response->getBody()->json());
    }

    /**
     * @throws HttpRequestFailedException
     * @throws AuthorizeFailedException
     */
    public function refreshToken(string $refreshToken): AuthToken {
        try {
            $response = $this->client->post(self::TOKEN_URI, [
                'form_params' => [
                    'scope' => Constants::SCOPE,
                    'refresh_token' => $refreshToken,
                    'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
                    'token_format' => self::TOKEN_FORMAT
                ],
                'headers' => [
                    'Authorization' => 'Basic ' . Constants::AUTHORIZATION
                ],
                'allow_redirects' => false
            ]);
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        return new AuthToken($response->getBody()->json());
    }

    /**
     * @throws HttpRequestFailedException
     * @throws MissingCodeException
     * @throws AuthorizeFailedException
     */
    protected function authorize(string $npsso): string {
        try {
            $response = $this->client->get(self::AUTHORIZE_URI, [
                'query' => [
                    'access_type' => Constants::ACCESS_TYPE,
                    'client_id' => Constants::CLIENT_ID,
                    'redirect_uri' => self::REDIRECT_URI,
                    'response_type' => self::RESPONSE_TYPE,
                    'scope' => Constants::SCOPE
                ],
                'headers' => [
                    'Cookie' => "npsso={$npsso}"
                ],
                'allow_redirects' => false
            ]);
        } catch (GuzzleException $e) {
            throw new HttpRequestFailedException($e);
        }
        if ($response->getStatusCode() !== 302) {
            throw new AuthorizeFailedException($response);
        }
        return $this->getAuthorizeCode($response);
    }

    /**
     * @throws MissingCodeException
     */
    protected function getAuthorizeCode(ResponseInterface $response): string {
        $location = $response->getHeaderLine('Location');
        if (empty($location)) {
            throw new MissingCodeException($response);
        }
        parse_str(parse_url($location, PHP_URL_QUERY), $queries);
        if (!isset($queries['code'])) {
            throw new MissingCodeException($response);
        }
        return $queries['code'];
    }

}
