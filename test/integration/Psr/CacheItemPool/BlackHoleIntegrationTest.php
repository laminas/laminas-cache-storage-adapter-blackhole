<?php

namespace LaminasTest\Cache\Storage\Adapter\Psr\CacheItemPool;

use Cache\IntegrationTests\CachePoolTest;
use Laminas\Cache\Psr\CacheItemPool\CacheItemPoolDecorator;
use Laminas\Cache\Storage\Adapter\BlackHole;

final class BlackHoleIntegrationTest extends CachePoolTest
{
    private const TEST_NOT_SUPPORTED_REASON = 'BlackHole never caches.';

    /** @var string[] */
    protected $skippedTests = [
        'testBasicUsage'                                   => self::TEST_NOT_SUPPORTED_REASON,
        'testGetItem'                                      => self::TEST_NOT_SUPPORTED_REASON,
        'testGetItems'                                     => self::TEST_NOT_SUPPORTED_REASON,
        'testHasItem'                                      => self::TEST_NOT_SUPPORTED_REASON,
        'testDeleteItems'                                  => self::TEST_NOT_SUPPORTED_REASON,
        'testSave'                                         => self::TEST_NOT_SUPPORTED_REASON,
        'testSaveWithoutExpire'                            => self::TEST_NOT_SUPPORTED_REASON,
        'testDeferredSave'                                 => self::TEST_NOT_SUPPORTED_REASON,
        'testDeferredSaveWithoutCommit'                    => self::TEST_NOT_SUPPORTED_REASON,
        'testCommit'                                       => self::TEST_NOT_SUPPORTED_REASON,
        'testExpiresAt'                                    => self::TEST_NOT_SUPPORTED_REASON,
        'testExpiresAtWithNull'                            => self::TEST_NOT_SUPPORTED_REASON,
        'testExpiresAfterWithNull'                         => self::TEST_NOT_SUPPORTED_REASON,
        'testKeyLength'                                    => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeString'                               => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeInteger'                              => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeNull'                                 => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeFloat'                                => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeBoolean'                              => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeArray'                                => self::TEST_NOT_SUPPORTED_REASON,
        'testDataTypeObject'                               => self::TEST_NOT_SUPPORTED_REASON,
        'testIsHit'                                        => self::TEST_NOT_SUPPORTED_REASON,
        'testIsHitDeferred'                                => self::TEST_NOT_SUPPORTED_REASON,
        'testSaveDeferredWhenChangingValues'               => self::TEST_NOT_SUPPORTED_REASON,
        'testSaveDeferredOverwrite'                        => self::TEST_NOT_SUPPORTED_REASON,
        'testSavingObject'                                 => self::TEST_NOT_SUPPORTED_REASON,
        'testHasItemReturnsFalseWhenDeferredItemIsExpired' => self::TEST_NOT_SUPPORTED_REASON,
        'testBinaryData'                                   => self::TEST_NOT_SUPPORTED_REASON,
        'testBasicUsageWithLongKey'                        => self::TEST_NOT_SUPPORTED_REASON,
    ];

    public function createCachePool(): CacheItemPoolDecorator
    {
        return new CacheItemPoolDecorator(new BlackHole(['psr' => true]));
    }
}
