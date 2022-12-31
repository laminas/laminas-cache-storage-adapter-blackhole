<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter\BlackHole;

use Laminas\Cache\Storage\Adapter\BlackHole\ConfigProvider;
use Laminas\Cache\Storage\Adapter\BlackHole\Module;
use PHPUnit\Framework\TestCase;

final class ModuleTest extends TestCase
{
    private Module $module;

    protected function setUp(): void
    {
        parent::setUp();
        $this->module = new Module();
    }

    public function testWillReturnConfigProviderConfiguration(): void
    {
        $expected = (new ConfigProvider())->getServiceDependencies();
        $config   = $this->module->getConfig();
        self::assertArrayHasKey('service_manager', $config);
        self::assertSame($expected, $config['service_manager']);
        self::assertArrayNotHasKey('dependencies', $config);
    }
}
