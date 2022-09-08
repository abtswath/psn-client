<?php

namespace Abtswath\PSNClient\Exceptions;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

class HttpRequestFailedException extends Exception {

    private GuzzleException $exception;

    public function __construct(GuzzleException $exception) {
        $this->exception = $exception;
        parent::__construct($exception->getMessage(), $exception->getCode());
    }

    /**
     * @return GuzzleException
     */
    public function getException(): GuzzleException {
        return $this->exception;
    }

}
