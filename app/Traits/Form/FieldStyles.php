<?php

namespace App\Traits\Form;

/**
 * Trait FieldStyles.
 */
trait FieldStyles
{

    /**
     * Use Loading
     * @var bool
     */
    public $useLoading = true;

    /**
     * @param string $field
     * @return string|null
     */
    public function setDisabledFields(string $field): ?string
    {
        return null;
    }

    /**
     * @param string $field
     * @return bool
     */
    public function isUseLoading(): ?bool
    {
        return $this->useLoading === true;
    }

}
