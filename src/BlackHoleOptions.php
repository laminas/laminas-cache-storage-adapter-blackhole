<?php

namespace Laminas\Cache\Storage\Adapter;

final class BlackHoleOptions extends AdapterOptions
{
    /**
     * Flag to optionally allow PSR compatibility.
     * This flag is necessary due to the fact that providing proper PSR support without BC
     * breaks wont be possible otherwise.
     *
     * @var bool
     */
    protected $psr = false;

    /**
     * @internal
     *
     * @return bool
     */
    public function isPsrCompatible()
    {
        return $this->psr;
    }

    /**
     * @internal
     *
     * @param bool $psr
     * @return void
     */
    public function setPsr($psr)
    {
        $this->psr = (bool) $psr;
    }
}
