<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter;

use Laminas\Cache\Storage\AbstractMetadataCapableAdapter;
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

use const PHP_INT_MAX;

/**
 * @template TKey
 * @template TValue
 * @implements IterableInterface<TKey, TValue>
 * @template-extends AbstractMetadataCapableAdapter<AdapterOptions,object>
 */
final class BlackHole extends AbstractMetadataCapableAdapter implements
    AvailableSpaceCapableInterface,
    ClearByNamespaceInterface,
    ClearByPrefixInterface,
    ClearExpiredInterface,
    FlushableInterface,
    IterableInterface,
    OptimizableInterface,
    TaggableInterface,
    TotalSpaceCapableInterface
{
    /**
     * {@inheritDoc}
     */
    protected function internalGetItem(string $normalizedKey, ?bool &$success = null, mixed &$casToken = null): mixed
    {
        $success = false;
        return null;
    }

    /**
     * {@inheritDoc}
     */
    protected function internalSetItem(string $normalizedKey, mixed $value): bool
    {
        return $this->getOptions()->getWritable();
    }

    /**
     * {@inheritDoc}
     */
    protected function internalRemoveItem(string $normalizedKey): bool
    {
        return false;
    }

    protected function internalGetMetadata(string $normalizedKey): ?object
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getCapabilities(): Capabilities
    {
        return $this->capabilities ??= new Capabilities(
            Capabilities::UNLIMITED_KEY_LENGTH,
            true,
            false,
            [
                'NULL'     => true,
                'boolean'  => true,
                'integer'  => true,
                'double'   => true,
                'string'   => true,
                'array'    => true,
                'object'   => true,
                'resource' => true,
            ],
            1,
            false,
        );
    }

    public function getAvailableSpace(): int
    {
        return PHP_INT_MAX;
    }

    /**
     * {@inheritDoc}
     */
    public function clearByNamespace(string $namespace): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function clearByPrefix(string $prefix): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function clearExpired(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function flush(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): KeyListIterator
    {
        return new KeyListIterator($this, []);
    }

    /**
     * {@inheritDoc}
     */
    public function optimize(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function setTags(string $key, array $tags): bool
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function getTags(string $key): false|array
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function clearByTags(array $tags, bool $disjunction = false): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalSpace(): int
    {
        return PHP_INT_MAX;
    }
}
