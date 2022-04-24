<?php

namespace App\Traits\ViewComponent;
use Illuminate\Support\HtmlString;

/**
 * Trait ViewComponentType.
 */
trait ViewComponentType
{
    /**
     * @var array
     */
    protected $arrayOfComponents = [];

    /**
     * @var array
     */
    protected $bladeComponents = [];

    /**
     * @var array
     */
    protected $customSlots = [];
    
    /**
     * @param  array  $arrayOfComponents
     * @param  array  $componentAttributes
     * @return $this
     */
    public function arrayOfComponents(array $arrayOfComponents = [], array $componentAttributes = [] ):self
    {
        $this->type = 'array';
        $this->arrayOfComponents = $arrayOfComponents;
        $this->componentAttributes = $componentAttributes;
        return $this;
    } 

    /**
     * @param  string  $componentName
     * @param  array  $componentAttributes
     * @return $this
     */
    public function blade(string $componentName, array $componentAttributes = []):self
    {
        $this->type = 'blade';
        $this->componentName = $componentName;
        $this->componentAttributes = $componentAttributes;
        return $this;
    }

    /**
     * @param  array  $arrayOfComponents
     * @return $this
     */
    public function bladeComponents(array $arrayOfComponents = []):self
    {
        $this->bladeComponents = $arrayOfComponents;
        return $this;
    }
    
    /**
     * @param  array  $arrayOfComponents
     * @return $this
     */
    public function customSlots(array $arrayOfComponents = []):self
    {
        $this->customSlots = $arrayOfComponents;
        return $this;
    }

    /**
     * @param  string  $componentName
     * @param  array  $componentAttributes
     * @return $this
     */
    public function livewire(string $componentName, array $componentAttributes = []):self
    {
        $this->type = 'livewire';
        $this->componentName = $componentName;
        $this->componentAttributes = $componentAttributes;
        return $this;
    }

    /**
     * @param  string  $html
     * @return $this
     */
    public function html(string $html ):self
    {
        $this->type = 'html';
        $this->componentRaw = new HtmlString($html);
        return $this;
    }

    /**
     * @param  string  $raw
     * @return $this
     */
    public function rawString(string $rawString ):self
    {
        $this->type = 'raw';
        $this->componentRaw = $rawString;
        return $this;
    }

    /**
     * @return array
     */
    public function getArrayOfComponents(): array
    {
        return $this->arrayOfComponents;
    }

    /**
     * @return array
     */
    public function getBladeComponents(): array
    {
        return $this->bladeComponents;
    }
    
    /**
     * @return array
     */
    public function getCustomSlots(): array
    {
        return $this->customSlots;
    }
    
}
