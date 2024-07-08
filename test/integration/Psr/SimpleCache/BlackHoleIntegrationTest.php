<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter\Psr\SimpleCache;

use Laminas\Cache\Psr\SimpleCache\SimpleCacheDecorator;
use Laminas\Cache\Storage\Adapter\BlackHole;
use PHPUnit\Framework\TestCase;

final class BlackHoleIntegrationTest extends TestCase
{
    public function testCanBeUsedToInstantiateDecorator(): void
    {
        $cache = new SimpleCacheDecorator(new BlackHole());
        self::assertTrue($cache->clear());
    }
}
