<?php

namespace Abtswath\PSNClient\Exceptions;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

class MissingHandlerException extends Exception implements NotFoundExceptionInterface {
    public function __construct(string $id) {
        parent::__construct(sprintf('Handler [%s] is not exists', $id));
    }

}
