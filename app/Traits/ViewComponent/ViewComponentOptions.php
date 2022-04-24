<?php

namespace App\Traits\ViewComponent;

/**
 * Trait ViewComponentOptions.
 */
trait ViewComponentOptions
{
    /**
     * @var bool
     */
    protected $useLabel = true;

    /**
     * @var array
     */
    protected $componentAttributes = [];

    /**
     * @var string
     */
    protected $componentName = '';
    
    /**
     * @var string
     */
    protected $componentKey;

    /**
     * @var mixed
     */
    protected $componentRaw;

    /**
     * @var bool
     */
    protected $inline = false;

    /**
     * @var bool
     */
    protected $bordered = true;

    /**
     * @var bool
     */
    protected $roundBorder = true;

    /**
     * @var array
     */
    protected $columnAttributes = [];

    /**
     * @return $this
     */
    public function withoutLabel(): self
    {
        $this->useLabel = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseLabel(): bool
    {
        return $this->useLabel === true;
    }

    /**
     * @return array
     */
    public function getComponentAttributes(): array
    {
        return $this->componentAttributes;
    }

    /**
     * @return $this
     */
    public function inline():self
    {
        $this->inline = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInline(): bool
    {
        return $this->inline === true;
    }

    /**
     * @return $this
     */
    public function noBorder():self
    {
        $this->bordered = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBordered(): bool
    {
        return $this->bordered === true;
    }

    /**
     * @return $this
     */
    public function straightBorder():self
    {
        $this->roundBorder = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRoundBorder(): bool
    {
        return $this->roundBorder === true;
    }

    /**
     * @param  array  $columnAttributes
     * @return $this
     */
    public function columnAttributes(array $columnAttributes):self
    {
        $this->columnAttributes = $columnAttributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getColumnAttributes(): array
    {
        return $this->columnAttributes;
    }

    public function getRawResult()
    {
        return $this->componentRaw;
    }

    /**
     * @return string
     */
    public function getComponentName(): string
    {
        return $this->componentName;
    }

    /**
     * @param  array  $key
     * @return $this
     */
    public function componentKey($key):self
    {
        $this->componentKey = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getComponentKey()
    {
        return $this->componentKey;
    }
}
