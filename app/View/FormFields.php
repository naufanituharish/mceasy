<?php

namespace App\View;

use Illuminate\Support\Str;
use App\Traits\CanBeHidden;
use App\Traits\RawData;
use App\Traits\Form\FieldOptions;
use App\Traits\Form\FieldType;

/**
 * Class FormFields.
 */
class FormFields
{
    use CanBeHidden, 
        FieldOptions, 
        FieldType, 
        RawData;

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
     * @var mixed
     */
    protected $fieldRules = null;

    /**
     * @var array
     */
    protected $errorMessage = [];

    /**
     * @var
     */
    protected $formatCallback;

    /**
     * @var bool
     */
    protected $realtimeValidation = false;

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
     * @return FormFields
     */
    public static function make(string $text, ?string $property = null): FormFields
    {
        return new static($text, $property);
    }

    /**
     * @return bool
     */
    public function isFormatted(): bool
    {
        return is_callable($this->formatCallback);
    }

    /**
     * @param  callable  $callable
     *
     * @return $this
     */
    public function format(callable $callable): FormFields
    {
        $this->formatCallback = $callable;
        return $this;
    }

    /**
     * @param $property
     * @param $value
     *
     * @return mixed
     */
    public function formatted($label, $property)
    {
        return app()->call($this->formatCallback, ['label' => $label, 'property' => $property]);
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

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->fieldRules;
    }

    /**
     * @param  mixed  $rules
     * @return $this
     */
    public function fieldRules($rules): self
    {
        $this->fieldRules = $rules;
        return $this;
    }

    /**
     * @param  array  $errorMessage
     *
     * @return $this
     */
    public function errorMessage(array $errorMessage): self
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrorMessage(): array
    {
        return $this->errorMessage;
    }

    /**
     * @return $this
     */
    public function useRealtimeValidation(): self
    {
        $this->realtimeValidation = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRealtimeValidation(): bool
    {
        return $this->realtimeValidation === true;
    }
}
