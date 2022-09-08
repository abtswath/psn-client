<?php

namespace Abtswath\PSNClient\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

class AuthorizeFailedException extends Exception {

    private ResponseInterface $response;

    public function __construct(ResponseInterface $response) {
        $this->response = $response;
        parent::__construct(sprintf('Failed to authorize [%d]: %s', $response->getStatusCode(), $response->getBody()->getContents()));
    }

    public function getResponse(): ResponseInterface {
        return $this->response;
    }
}
