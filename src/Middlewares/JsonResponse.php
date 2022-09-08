<?php

namespace Abtswath\PSNClient\Middlewares;

use Abtswath\PSNClient\Exceptions\InvalidHttpResponseException;
use Psr\Http\Message\ResponseInterface;

class JsonResponse {

    /**
     * @throws InvalidHttpResponseException
     */
    public function __invoke(ResponseInterface $response, array $options = []): ResponseInterface {
        if ($response->getStatusCode() < 200 || $response->getStatusCode() > 400) {
            throw new InvalidHttpResponseException($response);
        }
        if ($response->getStatusCode() >= 300) {
            return $response;
        }
        return $response->withBody(new JsonStream($response->getBody()));
    }

}
