<?php

namespace App\View;

use Illuminate\Support\Str;
use App\Traits\CanBeHidden;
use App\Traits\RawData;

/**
 * Class Column.
 */
class Column
{
    use CanBeHidden, RawData;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $attribute;

    /**
     * @var bool
     */
    protected $sortable = false;

    /**
     * @var bool
     */
    protected $searchable = false;

    /**
     * @var string
     */
    protected $colSpan;

    /**
     * @var string
     */
    protected $rowspan;

    /**
     * @var string
     */
    protected $isTdShow = true; 

    /**
     * @var
     */
    protected $formatCallback;
    
    /**
     * @var
     */
    protected $sortCallback;

    /**
     * @var null
     */
    protected $searchCallback;

    /**
     * @var bool
     */
    protected $useColHeader = true;

    /**
     * Column constructor.
     *
     * @param  string  $text
     * @param  string|null  $attribute
     */
    public function __construct(string $text, ?string $attribute)
    {
        $this->text = $text;
        $this->attribute = $attribute ?? Str::snake(Str::lower($text));
    }

    /**
     * @param  string  $text
     * @param  string|null  $attribute
     *
     * @return Column
     */
    public static function make(string $text, ?string $attribute = null): Column
    {
        return new static($text, $attribute);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @return mixed
     */
    public function getSortCallback()
    {
        return $this->sortCallback;
    }

    /**
     * @return mixed
     */
    public function getSearchCallback()
    {
        return $this->searchCallback;
    }

    /**
     * @return bool
     */
    public function isNested()
    {
        $parts = explode('.', $this->attribute);

        return count($parts) > 1 ? true : false;
    }

    /**
     * @return string
     */
    public function getNestedAttribute()
    {
        $parts = explode('.', $this->attribute);
        return $parts;
    }

    /**
     * @return string
     */
    public function getColSpan()
    {
        return $this->colSpan;
    }

    /**
     * @return string
     */
    public function colSpan(string $value = null):self
    {
        $this->colSpan = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRowSpan()
    {
        return $this->rowspan;
    }

    /**
     * @return string
     */
    public function rowSpan(string $value = null):self
    {
        $this->rowspan = $value;
        return $this;
    }


    /**
     * @return string
     */
    public function isTdShown()
    {
        return $this->isTdShow === true;
    }

    /**
     * @return string
     */
    public function hideTd():self
    {
        $this->isTdShow = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseColHeader(): bool
    {
        return $this->useColHeader === true;
    }

    /**
     * @return string
     */
    public function withoutColHeader():self
    {
        $this->useColHeader = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFormatted(): bool
    {
        return is_callable($this->formatCallback);
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable === true;
    }

    /**
     * @return bool
     */
    public function isSearchable(): bool
    {
        return $this->searchable === true;
    }

    /**
     * @param  callable  $callable
     *
     * @return $this
     */
    public function format(callable $callable): Column
    {
        $this->formatCallback = $callable;

        return $this;
    }

    /**
     * @param $model
     * @param $column
     *
     * @return mixed
     */
    public function formatted($model, $column)
    {
        return app()->call($this->formatCallback, ['model' => $model, 'column' => $column]);
    }

    /**
     * @param  callable|null  $callable
     *
     * @return $this
     */
    public function sortable(callable $callable = null): self
    {
        $this->sortCallback = $callable;
        $this->sortable = true;

        return $this;
    }

    /**
     * @param  callable|null  $callable
     *
     * @return $this
     */
    public function searchable(callable $callable = null): self
    {
        $this->searchCallback = $callable;
        $this->searchable = true;

        return $this;
    }
}
