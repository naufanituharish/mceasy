<?php

namespace App\View;

use Illuminate\Support\Str;
use App\Traits\CanBeHidden;
use App\Traits\ViewComponent\ViewComponentOptions;
use App\Traits\ViewComponent\ViewComponentType;

/**
 * Class ViewComponents.
 */
class ViewComponent
{
    use CanBeHidden, 
        ViewComponentOptions, 
        ViewComponentType;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $property;

    /**
     * @var string
     */
    protected $type = '';

    /**
     * Column constructor.
     *
     * @param  string  $text
     * @param  string|null  $property
     */
    public function __construct(string $text, ?string $property)
    {
        $this->text = $text;
        $this->property = $property ?? Str::snake(Str::lower($text));
    }

    /**
     * @param  string  $text
     * @param  string|null  $property
     *
     * @return ViewComponents
     */
    public static function make(string $text, ?string $property = null): ViewComponent
    {
        return new static($text, $property);
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
    public function getProperty(): string
    {
        return $this->property;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
