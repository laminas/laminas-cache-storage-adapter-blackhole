<?php

/**
 * @see       https://github.com/laminas/laminas-cache for the canonical source repository
 * @copyright https://github.com/laminas/laminas-cache/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-cache/blob/master/LICENSE.md New BSD License
 */

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
