<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter;

use Laminas\Cache\Storage\Adapter\AdapterOptions;
use Laminas\Cache\Storage\Adapter\BlackHole;

/** @extends AbstractCommonAdapterTest<BlackHole, AdapterOptions> */
class BlackHoleTest extends AbstractCommonAdapterTest
{
    private const MESSAGE_UNSUPPORTED = 'Functionality is not supported by this adapter.';

    public function setUp(): void
    {
        $this->storage = new BlackHole();
        $this->options = new AdapterOptions();
        $this->storage->setOptions($this->options);
        parent::setUp();
    }

    public function testTaggableFunctionsOnEmptyStorage(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testTaggable(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testClearExpired(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testClearByNamespace(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testClearByPrefix(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testIterator(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testTouchItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testDecrementItemsReturnsEmptyArrayIfNonWritable(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetAndDecrementItems(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testDecrementItemReturnsFalseIfNonWritable(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testDecrementItemInitialValue(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testDecrementItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testIncrementItemsReturnsEmptyArrayIfNonWritable(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testIncrementItemsReturnsKeyValuePairsOfWrittenItems(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetAndIncrementItems(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testIncrementItemReturnsFalseIfNonWritable(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testIncrementItemInitialValue(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testIncrementItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testCheckAndSetItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testRemoveItemsReturnsMissingKeys(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testReplaceItemsReturnsFailedKeys(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testReplaceItemReturnsFalseIfNonWritable(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testReplaceItemReturnsFalseOnMissingItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testReplaceExistingItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testAddItemsReturnsFailedKeys(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testAddItemReturnsFalseIfItemAlreadyExists(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testAddNewItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetAndGetItemOfDifferentTypes(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetAndGetExpiredItems(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetGetHasAndRemoveItemsWithNamespace(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetGetHasAndRemoveItemWithNamespace(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetGetHasAndRemoveItemsWithoutNamespace(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testSetGetHasAndRemoveItemWithoutNamespace(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testGetMetadatasWithEmptyNamespace(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testGetMetadatas(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testGetMetadata(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testGetItemsReturnsKeyValuePairsOfFoundItems(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testGetItemSetsSuccessFlag(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testHasItemsReturnsKeysOfFoundItems(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }

    public function testHasItemReturnsTrueOnValidItem(): void
    {
        self::markTestSkipped(self::MESSAGE_UNSUPPORTED);
    }
}
