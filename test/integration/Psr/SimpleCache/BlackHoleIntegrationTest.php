<?php

/**
 * @see       https://github.com/laminas/laminas-cache for the canonical source repository
 * @copyright https://github.com/laminas/laminas-cache/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-cache/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Cache\Storage\Adapter\Psr\SimpleCache;

use Cache\IntegrationTests\SimpleCacheTest;
use Laminas\Cache\Psr\SimpleCache\SimpleCacheDecorator;
use Laminas\Cache\Storage\Adapter\BlackHole;

final class BlackHoleIntegrationTest extends SimpleCacheTest
{
    const TEST_NOT_SUPPORTED_REASON = 'BlackHole never caches.';

    protected $skippedTests = [
        'testSet' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetMultipleValidData' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetValidData' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetMultipleValidKeys' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetValidKeys' => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeObject' => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeArray' => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeBoolean' => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeFloat' => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeInteger' => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeString' => self::TEST_NOT_SUPPORTED_REASON,
        'testHas' => self::TEST_NOT_SUPPORTED_REASON,
        'testGetMultipleWithGenerator' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetMultipleWithGenerator' => self::TEST_NOT_SUPPORTED_REASON,
        'testGetMultiple' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetMultipleTtl' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetMultiple' => self::TEST_NOT_SUPPORTED_REASON,
        'testGet' => self::TEST_NOT_SUPPORTED_REASON,
        'testSetTtl' => self::TEST_NOT_SUPPORTED_REASON,
        'testObjectDoesNotChangeInCache' => self::TEST_NOT_SUPPORTED_REASON,
    ];

    public function createSimpleCache()
    {
        return new SimpleCacheDecorator(new BlackHole([
            'psr' => true,
        ]));
    }

    public function testCanClearWithoutNamespace()
    {
        $cache = new SimpleCacheDecorator(new BlackHole([
            'psr' => true,
            'namespace' => '',
        ]));

        self::assertTrue($cache->clear());
    }
}
