<?php

/**
 * @see       https://github.com/laminas/laminas-cache for the canonical source repository
 * @copyright https://github.com/laminas/laminas-cache/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-cache/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Cache\Storage\Adapter;

use Laminas\Cache\Storage\Adapter\AdapterOptions;
use Laminas\Cache\Storage\Adapter\BlackHole;
use Laminas\Cache\Storage\Adapter\BlackHoleOptions;
use Laminas\Cache\Storage\AdapterPluginManager;
use Laminas\Cache\Storage\AvailableSpaceCapableInterface;
use Laminas\Cache\Storage\Capabilities;
use Laminas\Cache\Storage\ClearByNamespaceInterface;
use Laminas\Cache\Storage\ClearByPrefixInterface;
use Laminas\Cache\Storage\ClearExpiredInterface;
use Laminas\Cache\Storage\FlushableInterface;
use Laminas\Cache\Storage\IterableInterface;
use Laminas\Cache\Storage\OptimizableInterface;
use Laminas\Cache\Storage\TaggableInterface;
use Laminas\Cache\Storage\TotalSpaceCapableInterface;
use Laminas\Cache\StorageFactory;
use Laminas\ServiceManager\ServiceManager;
use PHPUnit\Framework\TestCase;

/**
 * PHPUnit test case
 */

/**
 * @group      Laminas_Cache
 * @covers Laminas\Cache\Storage\Adapter\Blackhole<extended>
 */
class BlackHoleTest extends TestCase
{
    /**
     * The storage adapter
     *
     * @var StorageInterface
     */
    protected $storage;

    public function setUp(): void
    {
        $this->storage = StorageFactory::adapterFactory('BlackHole');
    }

    /**
     * A data provider for common storage adapter names
     */
    public function getCommonAdapterNamesProvider(): array
    {
        return [
            ['black_hole'],
            ['blackhole'],
            ['blackHole'],
            ['BlackHole'],
        ];
    }

    /**
     * @dataProvider getCommonAdapterNamesProvider
     */
    public function testAdapterPluginManagerWithCommonNames(string $commonAdapterName)
    {
        $pluginManager = new AdapterPluginManager(new ServiceManager());
        $this->assertTrue(
            $pluginManager->has($commonAdapterName),
            "Storage adapter name '{$commonAdapterName}' not found in storage adapter plugin manager"
        );
    }

    public function testGetOptions()
    {
        $options = $this->storage->getOptions();
        $this->assertInstanceOf(AdapterOptions::class, $options);
    }

    public function testSetOptions()
    {
        $this->storage->setOptions(['namespace' => 'test']);
        $this->assertSame('test', $this->storage->getOptions()->getNamespace());
    }

    public function testGetCapabilities()
    {
        $capabilities = $this->storage->getCapabilities();
        $this->assertInstanceOf(Capabilities::class, $capabilities);
    }

    public function testSingleStorageOperatios()
    {
        $this->assertFalse($this->storage->setItem('test', 1));
        $this->assertFalse($this->storage->addItem('test', 1));
        $this->assertFalse($this->storage->replaceItem('test', 1));
        $this->assertFalse($this->storage->touchItem('test'));
        $this->assertFalse($this->storage->incrementItem('test', 1));
        $this->assertFalse($this->storage->decrementItem('test', 1));
        $this->assertFalse($this->storage->hasItem('test'));
        $this->assertNull($this->storage->getItem('test', $success));
        $this->assertFalse($success);
        $this->assertFalse($this->storage->getMetadata('test'));
        $this->assertFalse($this->storage->removeItem('test'));
    }

    public function testMultiStorageOperatios()
    {
        $this->assertSame(['test'], $this->storage->setItems(['test' => 1]));
        $this->assertSame(['test'], $this->storage->addItems(['test' => 1]));
        $this->assertSame(['test'], $this->storage->replaceItems(['test' => 1]));
        $this->assertSame(['test'], $this->storage->touchItems(['test']));
        $this->assertSame([], $this->storage->incrementItems(['test' => 1]));
        $this->assertSame([], $this->storage->decrementItems(['test' => 1]));
        $this->assertSame([], $this->storage->hasItems(['test']));
        $this->assertSame([], $this->storage->getItems(['test']));
        $this->assertSame([], $this->storage->getMetadatas(['test']));
        $this->assertSame(['test'], $this->storage->removeItems(['test']));
    }

    public function testAvailableSpaceCapableInterface()
    {
        $this->assertInstanceOf(AvailableSpaceCapableInterface::class, $this->storage);
        $this->assertSame(0, $this->storage->getAvailableSpace());
    }

    public function testClearByNamespaceInterface()
    {
        $this->assertInstanceOf(ClearByNamespaceInterface::class, $this->storage);
        $this->assertFalse($this->storage->clearByNamespace('test'));
    }

    public function testClearByPrefixInterface()
    {
        $this->assertInstanceOf(ClearByPrefixInterface::class, $this->storage);
        $this->assertFalse($this->storage->clearByPrefix('test'));
    }

    public function testCleariExpiredInterface()
    {
        $this->assertInstanceOf(ClearExpiredInterface::class, $this->storage);
        $this->assertFalse($this->storage->clearExpired());
    }

    public function testFlushableInterface()
    {
        $this->assertInstanceOf(FlushableInterface::class, $this->storage);
        $this->assertFalse($this->storage->flush());
    }

    public function testIterableInterface()
    {
        $this->assertInstanceOf(IterableInterface::class, $this->storage);
        $iterator = $this->storage->getIterator();
        foreach ($iterator as $item) {
            $this->fail('The iterator of the BlackHole adapter should be empty');
        }
    }

    public function testOptimizableInterface()
    {
        $this->assertInstanceOf(OptimizableInterface::class, $this->storage);
        $this->assertFalse($this->storage->optimize());
    }

    public function testTaggableInterface()
    {
        $this->assertInstanceOf(TaggableInterface::class, $this->storage);
        $this->assertFalse($this->storage->setTags('test', ['tag1']));
        $this->assertFalse($this->storage->getTags('test'));
        $this->assertFalse($this->storage->clearByTags(['tag1']));
    }

    public function testTotalSpaceCapableInterface()
    {
        $this->assertInstanceOf(TotalSpaceCapableInterface::class, $this->storage);
        $this->assertSame(0, $this->storage->getTotalSpace());
    }

    public function testSupportedDataTypes()
    {
        $capabilities       = $this->storage->getCapabilities();
        $supportedDataTypes = $capabilities->getSupportedDatatypes();
        $this->assertNotEmpty($supportedDataTypes);
        foreach ($supportedDataTypes as $supportedDataType) {
            $this->assertTrue($supportedDataType);
        }
    }

    public function testSetOptionsCreatesBlackHoleOptions()
    {
        $this->storage->setOptions([]);
        $this->assertInstanceOf(BlackHoleOptions::class, $this->storage->getOptions());
    }

    public function testGetOptionsReturnsBlackHoleOptions()
    {
        $this->assertInstanceOf(BlackHoleOptions::class, $this->storage->getOptions());
    }

    public function testConstructorPassesBlackHoleOptions()
    {
        $cache   = new BlackHole(['psr' => true]);
        $options = $cache->getOptions();
        $this->assertInstanceOf(BlackHoleOptions::class, $options);
        $this->assertTrue($options->isPsrCompatible());
    }

    public function testFlushReturnsTrueWhenPsrCompatibilityIsEnabled()
    {
        $cache = new BlackHole(['psr' => true]);
        $this->assertTrue($cache->flush());
    }

    public function testClearByNamespaceReturnsTrueWhenPsrCompatibilityIsEnabled()
    {
        $cache = new BlackHole(['psr' => true]);
        $this->assertTrue($cache->clearByNamespace('foo'));
    }
}
