<?php

namespace App\Traits\Form;

/**
 * Trait FieldOptions.
 */
trait FieldOptions
{
    /**
     * @var bool
     */
    protected $multiple = false; 

    /**
     * @var bool
     */
    protected $useLabel = true;

    /**
     * @var string
     */
    protected $placeholder = '';

    /**
     * @var array
     */
    protected $fieldAttributes = [];

    /**
     * @var string
     */
    protected $bindingMode = 'defer';

    /**
     * @var bool
     */
    protected $inline = false;

    /**
     * @var bool
     */
    protected $leftColumn = 4;

    /**
     * @var bool
     */
    protected $rightColumn = 8;

    /**
     * @var bool
     */
    protected $bordered = true;

    /**
     * @var bool
     */
    protected $liveSearch = true;

    /**
     * @var array
     */
    protected $useIndex = [];
    
    /**
     * @var bool
     */
    protected $prependIndex = false;

    /**
     * @var array
     */
    protected $columnAttributes = [];

    /**
     * @var array
     */
    protected $wrapperAttributes = [];

    /**
     * @var array
     */
    protected $formGroupExtra = [];

    /**
     * @return $this
     */
    public function multiple(): self
    {
        $this->multiple = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMultiple(): bool
    {
        return $this->multiple === true;
    }

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
     * @param  string  $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder === '' ? $this->text : $this->placeholder;
    }

    /**
     * @param  array  $fieldAttributes
     * @return $this
     */
    public function fieldAttributes(array $fieldAttributes):self
    {
        $this->fieldAttributes = $fieldAttributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getFieldAttributes(): array
    {
        return $this->fieldAttributes = array_merge($this->fieldAttributes, [ 
            'placeholder' => $this->getPlaceholder(),
            'multiple'    => $this->isMultiple()]);
    }

    /**
     * @param  string  $bindingMode
     * @return $this
     */
    public function bindingMode(string $bindingMode):self
    {
        $this->bindingMode = $bindingMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getBindingMode(): string
    {
        return $this->bindingMode;
    }

    /**
     * @return int
     */
    public function getLeftColumn(): int
    {
        return $this->leftColumn;
    }

    /**
     * @return int
     */
    public function getRightColumn(): int
    {
        return $this->rightColumn;
    }

    /**
     * @return $this
     */
    public function inline($left = 4, $right = 8):self
    {
        $this->inline = true;
        $this->leftColumn = $left;
        $this->rightColumn = $right;
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
    public function noLiveSearch():self
    {
        $this->liveSearch = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function withLiveSearch(): bool
    {
        return $this->liveSearch === true;
    }
    
    /**
     * @return $this
     */
    public function useIndex($value='id', $title='name', ...$prop):self
    {
        $this->useIndex = [$value,$title, ...$prop];
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseIndex(): array
    {
        return $this->useIndex;
    }

    /**
     * @return $this
     */
    public function prependIndex():self
    {
        $this->prependIndex = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function usePrependIndex(): bool
    {
        return $this->prependIndex === true;
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

    /**
     * @param  array  $wrapperAttributes
     * @return $this
     */
    public function wrapperAttributes(array $wrapperAttributes):self
    {
        $this->wrapperAttributes = $wrapperAttributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getWrapperAttributes(): array
    {
        return $this->wrapperAttributes;
    }
    
    /**
     * @param  array  $formGroupExtra
     * @return $this
     */
    public function formGroupExtra(array $formGroupExtra):self
    {
        $this->formGroupExtra = $formGroupExtra;
        return $this;
    }

    /**
     * @return array
     */
    public function getFormGroupExtra(): array
    {
        return $this->formGroupExtra;
    }

}
