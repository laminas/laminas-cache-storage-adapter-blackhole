<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter\Psr\SimpleCache;

use Laminas\Cache\Psr\SimpleCache\SimpleCacheDecorator;
use Laminas\Cache\Storage\Adapter\BlackHole;
use Laminas\Cache\Storage\StorageInterface;
use LaminasTest\Cache\Storage\Adapter\AbstractSimpleCacheIntegrationTest;

final class BlackHoleIntegrationTest extends AbstractSimpleCacheIntegrationTest
{
    private const TEST_NOT_SUPPORTED_REASON = 'BlackHole never caches.';

    protected function setUp(): void
    {
        parent::setUp();
        $this->skippedTests = [
            'testSet'                            => self::TEST_NOT_SUPPORTED_REASON,
            'testSetMultipleValidData'           => self::TEST_NOT_SUPPORTED_REASON,
            'testSetValidData'                   => self::TEST_NOT_SUPPORTED_REASON,
            'testSetMultipleValidKeys'           => self::TEST_NOT_SUPPORTED_REASON,
            'testSetValidKeys'                   => self::TEST_NOT_SUPPORTED_REASON,
            'testDataTypeObject'                 => self::TEST_NOT_SUPPORTED_REASON,
            'testDataTypeArray'                  => self::TEST_NOT_SUPPORTED_REASON,
            'testDataTypeBoolean'                => self::TEST_NOT_SUPPORTED_REASON,
            'testDataTypeFloat'                  => self::TEST_NOT_SUPPORTED_REASON,
            'testDataTypeInteger'                => self::TEST_NOT_SUPPORTED_REASON,
            'testDataTypeString'                 => self::TEST_NOT_SUPPORTED_REASON,
            'testHas'                            => self::TEST_NOT_SUPPORTED_REASON,
            'testGetMultipleWithGenerator'       => self::TEST_NOT_SUPPORTED_REASON,
            'testSetMultipleWithGenerator'       => self::TEST_NOT_SUPPORTED_REASON,
            'testGetMultiple'                    => self::TEST_NOT_SUPPORTED_REASON,
            'testSetMultipleTtl'                 => self::TEST_NOT_SUPPORTED_REASON,
            'testSetMultiple'                    => self::TEST_NOT_SUPPORTED_REASON,
            'testGet'                            => self::TEST_NOT_SUPPORTED_REASON,
            'testSetTtl'                         => self::TEST_NOT_SUPPORTED_REASON,
            'testObjectDoesNotChangeInCache'     => self::TEST_NOT_SUPPORTED_REASON,
            'testBasicUsageWithLongKey'          => self::TEST_NOT_SUPPORTED_REASON,
            'testBinaryData'                     => self::TEST_NOT_SUPPORTED_REASON,
            'testSetMultipleWithIntegerArrayKey' => self::TEST_NOT_SUPPORTED_REASON,
        ];
    }

    protected function createStorage(): StorageInterface
    {
        return new BlackHole();
    }

    public function testCanClearWithoutNamespace(): void
    {
        $cache = new SimpleCacheDecorator(new BlackHole([
            'namespace' => '',
        ]));

        self::assertTrue($cache->clear());
    }
}
