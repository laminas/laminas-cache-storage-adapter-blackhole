<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter\BlackHole;

use Laminas\Cache\Storage\Adapter\BlackHole\AdapterPluginManagerDelegatorFactory;
use LaminasTest\Cache\Storage\Adapter\PluginManagerDelegatorFactoryTestTrait;
use PHPUnit\Framework\TestCase;

final class AdapterPluginManagerDelegatorFactoryTest extends TestCase
{
    use PluginManagerDelegatorFactoryTestTrait;

    public function getCommonAdapterNamesProvider(): iterable
    {
        return [
            'underscore'     => ['black_hole'],
            'lowercase'      => ['blackhole'],
            'camelCase'      => ['blackHole'],
            'UpperCamelCase' => ['BlackHole'],
        ];
    }

    public function getDelegatorFactory(): callable
    {
        return new AdapterPluginManagerDelegatorFactory();
    }
}
