<?php

namespace Abtswath\PSNClient\Traits;

use ReflectionObject;
use ReflectionProperty;

trait Jsonable {
    public function jsonSerialize(): array {
        $reflector = new ReflectionObject($this);
        $properties = $reflector->getProperties(ReflectionProperty::IS_PRIVATE);
        $data = [];
        foreach ($properties as $property) {
            $data[$property->getName()] = $property->getValue($this);
        }
        return $data;
    }
}
