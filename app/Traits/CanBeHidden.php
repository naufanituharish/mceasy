<?php

namespace App\Traits;

/**
 * Trait CanBeHidden.
 */
trait CanBeHidden
{
    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * @var 
     */
    protected $hideFunction;

    /**
     * @param $condition
     *
     * @return $this
     */
    public function hideIf($condition): self
    {
        $this->hidden = $condition;

        return $this;
    }

    /**
     * @return $this
     */
    public function hide(): self
    {
        $this->hidden = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->hidden !== true;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return ! $this->isVisible();
    }

    /**
     * @return bool
     */
    public function ableToHide(): bool
    {
        return is_callable($this->hideFunction);
    }

    /**
     * @param  callable  $callable
     * @return $this
     */
    public function setVisibleIf(callable $callable): self
    {
        $this->hideFunction = $callable;
        return $this;
    }

    /**
     * @param $model
     * @param $column
     *
     * @return mixed
     */
    public function setHide($model, $column)
    {
        return app()->call($this->hideFunction, ['model' => $model, 'column' => $column]);
    }
}
