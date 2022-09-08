<?php

namespace Abtswath\PSNClient\Middlewares;

use GuzzleHttp\Psr7\StreamDecoratorTrait;
use JsonException;
use Psr\Http\Message\StreamInterface;

class JsonStream implements StreamInterface {

    use StreamDecoratorTrait;

    /**
     * @throws JsonException
     */
    public function json() {
        return json_decode($this->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }
}
