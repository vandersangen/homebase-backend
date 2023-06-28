<?php

declare(strict_types=1);

namespace App\Infrastructure\ApiPlatform\Core;

use ApiPlatform\Operation\PathSegmentNameGeneratorInterface;
use ApiPlatform\Util\Inflector;

final class SingularPathSegmentNameGenerator implements PathSegmentNameGeneratorInterface
{
    public function getSegmentName(string $name, bool $collection = true): string
    {
        return Inflector::tableize($name);
    }
}