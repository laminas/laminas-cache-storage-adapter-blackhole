<?php

namespace LaminasTest\Cache\Storage\Adapter;

use Laminas\Cache\Storage\Adapter\BlackHoleOptions;
use PHPUnit\Framework\TestCase;

final class BlackHoleOptionsTest extends TestCase
{
    public function testWillPassConstructValuesToProperties()
    {
        $options = new BlackHoleOptions([
            'psr' => true,
        ]);

        self::assertTrue($options->isPsrCompatible());
    }

    public function testPsrCompatibilityIsDisabledByDefault()
    {
        $options = new BlackHoleOptions();
        self::assertFalse($options->isPsrCompatible());
    }

    public function testWillSetPsrOption()
    {
        $options = new BlackHoleOptions();
        self::assertFalse($options->isPsrCompatible());
        $options->setPsr(true);
        self::assertTrue($options->isPsrCompatible());
    }
}
