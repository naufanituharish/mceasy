<?php

namespace App\Traits\Table;

/**
 * Trait TableStyle.
 */
trait TableStyle
{
    /**
     * @param $attribute
     * @return string|null
     */
    public function setThClass($attribute): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @return string|null
     */
    public function setThId($attribute): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @return array|null
     */
    public function setThAttributes($attribute): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function setThIndexAttributes(): array
    {
        return [];
    } 

    /**
     * @param $model
     * @return string|null
     */
    public function setTableRowClass($model): ?string
    {
        return null;
    }

    /**
     * @param $model
     * @return string|null
     */
    public function setTableRowId($model): ?string
    {
        return null;
    }

    /**
     * @param $model
     * @return array
     */
    public function setTableRowAttributes($model): array
    {
        return [];
    }

    /**
     * @param $attribute
     * @param $value
     * @return string|null
     */
    public function setTableDataClass($attribute, $value): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     * @return string|null
     */
    public function setTableDataId($attribute, $value): ?string
    {
        return null;
    }

    /**
     * @param $attribute
     * @param $value
     * @return array
     */
    public function setTableDataAttributes($attribute, $value): array
    {
        return [];
    } 
    
    /**
     * @return array
     */
    public function setTableIndexAttributes(): array
    {
        return [];
    } 
}
