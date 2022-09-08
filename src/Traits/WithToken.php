<?php

namespace Abtswath\PSNClient\Traits;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

trait WithToken {

    private Client $client;

    protected string $accessToken;

    public function __construct(Client $client, string $accessToken) {
        $this->client = $client;
        $this->accessToken = $accessToken;
    }

    /**
     * @throws GuzzleException
     */
    protected function get(string $uri, array $options = []): ResponseInterface {
        return $this->client->get($uri, $this->makeAuthorizationOptions($options));
    }

    /**
     * @throws GuzzleException
     */
    protected function post(string $uri, array $options = []): ResponseInterface {
        return $this->client->post($uri, $this->makeAuthorizationOptions($options));
    }

    /**
     * @throws GuzzleException
     */
    protected function request(string $method, string $uri, array $options = []): ResponseInterface {
        return $this->client->request($method, $uri, $this->makeAuthorizationOptions($options));
    }

    protected function makeAuthorizationOptions(array $options = []): array {
        if (!isset($options['headers'])) {
            $options['headers'] = [];
        }
        $options['headers']['Authorization'] = "Bearer {$this->accessToken}";
        return $options;
    }

}
