<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter\BlackHole;

use Interop\Container\ContainerInterface;
use Laminas\Cache\Storage\Adapter\BlackHole;
use Laminas\Cache\Storage\AdapterPluginManager;
use Laminas\ServiceManager\Factory\InvokableFactory;

use function assert;

final class AdapterPluginManagerDelegatorFactory
{
    public function __invoke(ContainerInterface $container, string $name, callable $callback): AdapterPluginManager
    {
        $pluginManager = $callback();
        assert($pluginManager instanceof AdapterPluginManager);

        $pluginManager->configure([
            'factories' => [
                BlackHole::class => InvokableFactory::class,
            ],
            'aliases'   => [
                'black_hole' => BlackHole::class,
                'blackhole'  => BlackHole::class,
                'blackHole'  => BlackHole::class,
                'BlackHole'  => BlackHole::class,
            ],
        ]);

        return $pluginManager;
    }
}
