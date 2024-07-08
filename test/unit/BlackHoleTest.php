<?php

declare(strict_types=1);

namespace LaminasTest\Cache\Storage\Adapter;

use Laminas\Cache\Storage\Adapter\BlackHole;
use PHPUnit\Framework\TestCase;

final class BlackHoleTest extends TestCase
{
    private BlackHole $storage;

    public function setUp(): void
    {
        $this->storage = new BlackHole();
        parent::setUp();
    }

    public function testPersistenceReturnsTrue(): void
    {
        self::assertTrue($this->storage->setItem('foo', 'bar'));
        self::assertSame([], $this->storage->setItems(['foo' => 'bar', 'bar' => 'baz']));
        self::assertTrue($this->storage->addItem('foo', 'bar'));
        self::assertSame([], $this->storage->addItems(['foo' => 'bar', 'bar' => 'baz']));
    }

    public function testPersistenceModificationsReturnFalse(): void
    {
        self::assertFalse($this->storage->removeItem('foo'));
        self::assertSame(['foo', 'bar'], $this->storage->removeItems(['foo', 'bar']));
        self::assertFalse($this->storage->touchItem('foo'));
        self::assertSame(['foo', 'bar'], $this->storage->touchItems(['foo', 'bar']));
    }

    public function testPersistenceNeverPersists(): void
    {
        self::assertTrue($this->storage->setItem('foo', 'bar'));
        self::assertFalse($this->storage->hasItem('foo'));
        self::assertSame([], $this->storage->setItems(['foo' => 'bar', 'bar' => 'baz']));
        self::assertSame([], $this->storage->hasItems(['foo', 'bar']));
        self::assertTrue($this->storage->addItem('foo', 'bar'));
        self::assertFalse($this->storage->hasItem('foo'));
        self::assertSame([], $this->storage->addItems(['foo' => 'bar', 'bar' => 'baz']));
        self::assertSame([], $this->storage->hasItems(['foo', 'bar']));
    }
}
