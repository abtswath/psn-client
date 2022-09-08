<?php

namespace Abtswath\PSNClient;

use Abtswath\PSNClient\Handlers\Trophy;
use Abtswath\PSNClient\Handlers\User;
use Abtswath\PSNClient\Middlewares\JsonResponse;
use Abtswath\PSNClient\Handlers\Auth;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @method Auth auth()
 * @method User user()
 * @method Trophy trophy()
 */
class Client {

    protected ?HttpClient $client = null;

    protected Container $container;

    protected string $language = 'zh-Hans';

    protected string $accessToken = '';

    public function __construct($language = 'zh-Hans') {
        $this->container = new Container();
        $this->register();
        $this->language = $language;
        $this->makeHttpClient();
    }

    protected function register(): void {
        $this->container->alias(Auth::class, 'auth');
        $this->container->alias(User::class, 'user');
        $this->container->alias(Trophy::class, 'trophy');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function make($class, $arguments) {
        $parameters = [$this->client];
        if ($class !== 'auth') {
            $parameters[] = $this->accessToken;
        }
        return $this->container->make($class, [...$parameters, ...$arguments]);
    }

    public function setAccessToken(string $accessToken): self {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __call(string $name, array $arguments) {
        return $this->make($name, $arguments);
    }

    protected function makeHttpClient() {
        $this->client = new HttpClient([
            'timeout' => 2.0,
            'handler' => $this->stack(),
            'verify' => false,
            'base_uri' => Constants::BASE_URI,
            'headers' => [
                'Accept-Language' => $this->language
            ]
        ]);
    }

    protected function stack(): HandlerStack {
        $stack = HandlerStack::create();
        $stack->push(Middleware::mapResponse(new JsonResponse()));
        return $stack;
    }

}
