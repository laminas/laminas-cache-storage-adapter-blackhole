<?php

declare(strict_types=1);

namespace Laminas\Cache\Storage\Adapter;

use Laminas\Cache\Exception\InvalidArgumentException;
use Laminas\Cache\Storage\AvailableSpaceCapableInterface;
use Laminas\Cache\Storage\Capabilities;
use Laminas\Cache\Storage\ClearByNamespaceInterface;
use Laminas\Cache\Storage\ClearByPrefixInterface;
use Laminas\Cache\Storage\ClearExpiredInterface;
use Laminas\Cache\Storage\FlushableInterface;
use Laminas\Cache\Storage\IterableInterface;
use Laminas\Cache\Storage\OptimizableInterface;
use Laminas\Cache\Storage\StorageInterface;
use Laminas\Cache\Storage\TaggableInterface;
use Laminas\Cache\Storage\TotalSpaceCapableInterface;
use stdClass;
use Traversable;

use function assert;

use const PHP_INT_MAX;

final class BlackHole implements
    StorageInterface,
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
     * Capabilities of this adapter
     *
     * @var null|Capabilities
     */
    protected $capabilities;

    /**
     * Marker to change capabilities
     *
     * @var null|object
     */
    protected $capabilityMarker;

    /**
     * options
     *
     * @var null|AdapterOptions
     */
    protected $options;

    /**
     * Constructor
     *
     * @param null|array|Traversable|AdapterOptions $options
     */
    public function __construct($options = null)
    {
        if ($options) {
            $this->setOptions($options);
        }
    }

    /**
     * Set options.
     *
     * @param array|Traversable|AdapterOptions $options
     * @return BlackHole Provides a fluent interface
     */
    public function setOptions($options)
    {
        if ($this->options !== $options) {
            if (! $options instanceof AdapterOptions) {
                $options = new AdapterOptions($options);
            }
            if ($this->options) {
                $this->options->setAdapter(null);
            }

            $options->setAdapter($this);
            $this->options = $options;
        }
        return $this;
    }

    /**
     * Get options
     *
     * @return AdapterOptions
     */
    public function getOptions()
    {
        if (! $this->options) {
            $this->setOptions(new AdapterOptions());
            assert($this->options instanceof AdapterOptions);
        }

        return $this->options;
    }

    /**
     * Get an item.
     *
     * @param  string  $key
     * @param  bool $success
     * @param  mixed   $casToken
     * @return mixed Data on success, null on failure
     */
    public function getItem($key, &$success = null, &$casToken = null)
    {
        $success = false;

        return null;
    }

    /**
     * Get multiple items.
     *
     * @param  array $keys
     * @return array Associative array of keys and values
     */
    public function getItems(array $keys)
    {
        return [];
    }

    /**
     * Test if an item exists.
     *
     * @param  string $key
     * @return bool
     */
    public function hasItem($key)
    {
        return false;
    }

    /**
     * Test multiple items.
     *
     * @param  array $keys
     * @return array Array of found keys
     */
    public function hasItems(array $keys)
    {
        return [];
    }

    /**
     * Get metadata of an item.
     *
     * @param  string $key
     * @return array|bool Metadata on success, false on failure
     */
    public function getMetadata($key)
    {
        return false;
    }

    /**
     * Get multiple metadata
     *
     * @param  array $keys
     * @return array Associative array of keys and metadata
     */
    public function getMetadatas(array $keys)
    {
        return [];
    }

    /**
     * Store an item.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function setItem($key, $value)
    {
        return $this->getOptions()->getWritable();
    }

    /**
     * Store multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Array of not stored keys
     */
    public function setItems(array $keyValuePairs)
    {
        if ($this->getOptions()->getWritable()) {
            return [];
        }

        return $keyValuePairs;
    }

    /**
     * Add an item.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function addItem($key, $value)
    {
        return $this->getOptions()->getWritable();
    }

    /**
     * Add multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Array of not stored keys
     */
    public function addItems(array $keyValuePairs)
    {
        if (! $this->getOptions()->getWritable()) {
            return $keyValuePairs;
        }

        return [];
    }

    /**
     * Replace an existing item.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function replaceItem($key, $value)
    {
        return $this->getOptions()->getWritable();
    }

    /**
     * Replace multiple existing items.
     *
     * @param  array $keyValuePairs
     * @return array Array of not stored keys
     */
    public function replaceItems(array $keyValuePairs)
    {
        if (! $this->getOptions()->getWritable()) {
            return $keyValuePairs;
        }

        return [];
    }

    /**
     * Set an item only if token matches
     *
     * It uses the token received from getItem() to check if the item has
     * changed before overwriting it.
     *
     * @param  mixed  $token
     * @param  string $key
     * @param  mixed  $value
     * @return bool
     */
    public function checkAndSetItem($token, $key, $value)
    {
        return $this->getOptions()->getWritable();
    }

    /**
     * Reset lifetime of an item
     *
     * @param  string $key
     * @return bool
     */
    public function touchItem($key)
    {
        return false;
    }

    /**
     * Reset lifetime of multiple items.
     *
     * @param  array $keys
     * @return array Array of not updated keys
     */
    public function touchItems(array $keys)
    {
        return $keys;
    }

    /**
     * Remove an item.
     *
     * @param  string $key
     * @return bool
     */
    public function removeItem($key)
    {
        return false;
    }

    /**
     * Remove multiple items.
     *
     * @param  array $keys
     * @return array Array of not removed keys
     */
    public function removeItems(array $keys)
    {
        return [];
    }

    /**
     * Increment an item.
     *
     * @param  string $key
     * @param  int    $value
     * @return int|bool The new value on success, false on failure
     */
    public function incrementItem($key, $value)
    {
        return false;
    }

    /**
     * Increment multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Associative array of keys and new values
     */
    public function incrementItems(array $keyValuePairs)
    {
        return [];
    }

    /**
     * Decrement an item.
     *
     * @param  string $key
     * @param  int    $value
     * @return int|bool The new value on success, false on failure
     */
    public function decrementItem($key, $value)
    {
        return false;
    }

    /**
     * Decrement multiple items.
     *
     * @param  array $keyValuePairs
     * @return array Associative array of keys and new values
     */
    public function decrementItems(array $keyValuePairs)
    {
        return [];
    }

    /**
     * Capabilities of this storage
     *
     * @return Capabilities
     */
    public function getCapabilities()
    {
        if ($this->capabilities === null) {
            // use default capabilities only
            $this->capabilityMarker = new stdClass();
            $this->capabilities     = new Capabilities($this, $this->capabilityMarker, [
                'supportedDatatypes' => [
                    'NULL'     => true,
                    'boolean'  => true,
                    'integer'  => true,
                    'double'   => true,
                    'string'   => true,
                    'array'    => true,
                    'object'   => true,
                    'resource' => true,
                ],
                'staticTtl'          => true,
                'minTtl'             => 1,
                'maxKeyLength'       => Capabilities::UNLIMITED_KEY_LENGTH,
                'ttlPrecision'       => 1,
                'useRequestTime'     => false,
            ]);
        }
        return $this->capabilities;
    }

    /* AvailableSpaceCapableInterface */

    /**
     * Get available space in bytes
     *
     * @return int
     */
    public function getAvailableSpace()
    {
        return PHP_INT_MAX;
    }

    /* ClearByNamespaceInterface */

    /**
     * Remove items of given namespace
     *
     * @param string $namespace
     * @return bool
     */
    public function clearByNamespace($namespace)
    {
        if ($namespace === '') {
            throw new InvalidArgumentException('Namespace must not be empty.');
        }
        return true;
    }

    /* ClearByPrefixInterface */

    /**
     * Remove items matching given prefix
     *
     * @param string $prefix
     * @return bool
     */
    public function clearByPrefix($prefix)
    {
        if ($prefix === '') {
            throw new InvalidArgumentException('Prefix must not be empty.');
        }

        return true;
    }

    /* ClearExpiredInterface */

    /**
     * Remove expired items
     *
     * @return bool
     */
    public function clearExpired()
    {
        return true;
    }

    /* FlushableInterface */

    /**
     * Flush the whole storage
     *
     * @return bool
     */
    public function flush()
    {
        return true;
    }

    /* IterableInterface */

    /**
     * Get the storage iterator
     *
     * @return KeyListIterator
     */
    public function getIterator(): Traversable
    {
        return new KeyListIterator($this, []);
    }

    /* OptimizableInterface */

    /**
     * Optimize the storage
     *
     * @return bool
     */
    public function optimize()
    {
        return true;
    }

    /* TaggableInterface */

    /**
     * Set tags to an item by given key.
     * An empty array will remove all tags.
     *
     * @param string   $key
     * @param string[] $tags
     * @return bool
     */
    public function setTags($key, array $tags)
    {
        return true;
    }

    /**
     * Get tags of an item by given key
     *
     * @param string $key
     * @return string[]|FALSE
     */
    public function getTags($key)
    {
        return false;
    }

    /**
     * Remove items matching given tags.
     *
     * If $disjunction only one of the given tags must match
     * else all given tags must match.
     *
     * @param string[] $tags
     * @param  bool  $disjunction
     * @return bool
     */
    public function clearByTags(array $tags, $disjunction = false)
    {
        return true;
    }

    /* TotalSpaceCapableInterface */

    /**
     * Get total space in bytes
     *
     * @return int|float
     */
    public function getTotalSpace()
    {
        return PHP_INT_MAX;
    }
}
