<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter\Psr\CacheItemPool;

use Laminas\Cache\Psr\CacheItemPool\CacheItemPoolDecorator;
use Laminas\Cache\Storage\Adapter\BlackHole;
use PHPUnit\Framework\TestCase;

final class BlackHoleIntegrationTest extends TestCase
{
    public function testCanBeUsedToInstantiateDecorator(): void
    {
        $cache = new CacheItemPoolDecorator(new BlackHole());
        self::assertTrue($cache->clear());
    }
}
