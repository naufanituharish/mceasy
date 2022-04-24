<?php

namespace App\Traits;

/**
 * Trait RawData.
 */
trait RawData
{
    /**
     * @var bool
     */
    protected $raw = false;

    /**
     * @return $this
     */
    public function raw(): self
    {
        $this->raw = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRaw(): bool
    {
        return $this->raw === true;
    }

}