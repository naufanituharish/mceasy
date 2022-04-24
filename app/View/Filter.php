<?php

namespace App\View;

use Illuminate\Support\Str;

/**
 * Class Filter.
 */
class Filter
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $attribute;
    
    /**
     * @var array
     */
    protected $arrayOfFilter = null;

    /**
     * @var string
     */
    protected $filterType;

    /**
     * @var mixed
     */
    protected $filterCallback;

    /**
     * Column constructor.
     *
     * @param  string  $text
     * @param  string|null  $attribute
     * @param  string  $type
     */
    public function __construct(string $text, ?string $attribute, ?string $type)
    {
        $this->text = $text;
        $this->attribute = $attribute ?? Str::snake(Str::lower($text));
        $this->filterType = $type;
    }

    /**
     * @param  string  $text
     * @param  string|null  $attribute
     * @param  string  $type
     *
     * @return Filter
     */
    public static function make(string $text, ?string $attribute = null, ?string $type = 'selectable'): Filter
    {
        return new static($text, $attribute, $type);
    }

    /**
     * @param  callable|null  $callable
     * @return $this
     */
    public function filterFunction(callable $callable = null): self
    {
        $this->filterCallback = $callable;
        return $this;
    }

    /**
     * @param  array  $arrayOfFilter
     * @return $this
     */
    public function arrayOfFilter(array $arrayOfFilter): self
    {
        $this->arrayOfFilter = $arrayOfFilter;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilterText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getFilterAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @return mixed
     */
    public function getFilterCallback()
    {
        return $this->filterCallback;
    }
    
    /**
     * @return array
     */
    public function getArrayOfFilter(): array
    {
        return $this->arrayOfFilter;
    }

    /**
     * @return array
     */
    public function getFilterType(): string
    {
        return $this->filterType;
    }
}
