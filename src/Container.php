<?php

namespace Abtswath\PSNClient;

use Abtswath\PSNClient\Exceptions\MissingHandlerException;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionException;

class Container implements ContainerInterface {

    protected array $instances = [];

    protected array $aliases = [];

    public function get(string $id) {
        return $this->instances[$id];
    }

    public function has(string $id): bool {
        return isset($this->instances[$id]);
    }

    /**
     * @throws MissingHandlerException
     */
    public function make(string $id, array $parameters = []) {
        if ($this->has($id)) {
            return $this->get($id);
        }
        return $this->resolve($id, $parameters);
    }

    /**
     * @throws MissingHandlerException
     */
    protected function resolve(string $id, array $parameters = []) {
        $abstract = $this->getAlias($id);
        try {
            $reflector = new ReflectionClass($abstract);
        } catch (ReflectionException $e) {
            throw new MissingHandlerException($id);
        }
        try {
            return $reflector->newInstanceArgs($parameters);
        } catch (ReflectionException $e) {
            throw new InvalidArgumentException();
        }
    }

    protected function getAlias(string $id): string {
        return $this->aliases[$id] ?? $id;
    }

    public function alias(string $class, string $alias): void {
        $this->aliases[$alias] = $class;
    }
}
