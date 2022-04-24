<?php

namespace App\View;
use App\Traits\CanBeHidden;

/**
 * Class ComponentMenu.
 */
class ComponentMenu
{
    use CanBeHidden;
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $componentName;

    /**
     * @var string
     */
    protected $componentKey;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * Column constructor.
     *
     * @param  string  $text
     * @param  string  $type
     */
    public function __construct(string $text, string $type)
    {
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * @param  string  $text
     * @param  string  $type
     *
     * @return ComponentMenu
     */
    public static function make(string $text, string $type = 'button'): ComponentMenu
    {
        return new static($text, $type);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param  array  $attributes
     * @return $this
     */
    public function attributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param  string  $componentName
     * @param  string  $componentKey
     * @return $this
     */
    public function livewire(string $componentName, string $componentKey):self
    {
        $this->type = 'livewire';
        $this->componentName = $componentName;
        $this->componentKey = $componentKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getComponentName(): string
    {
        return $this->componentName;
    }

    /**
     * @return string
     */
    public function getComponentKey(): string
    {
        return $this->componentKey;
    }
}
