<?php

namespace App\Traits\ViewContainer;
use Illuminate\Support\HtmlString;

/**
 * Trait ViewContainerProps.
 */
trait ViewContainerProps
{
    /**
     * Use Loading
     * @var bool
     */
    public $useLoading = true;

    /**
     * @param string $field
     * @return bool
     */
    public function isUseLoading(): ?bool
    {
        return $this->useLoading === true;
    }

    /**
     * Wrapper Name
     * @var string
     */
    public $wrapperName;

    /**
     * Wrapper Property
     * @var array
     */
    public $wrapperProps = [];

    /**
     * HTML String
     * @var string
     */
    public function html($string): HtmlString
    {
        return new HtmlString($string); 
    }
}
