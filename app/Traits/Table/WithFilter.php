<?php

namespace App\Traits\Table;
use Illuminate\Support\Arr;

/**
 * Trait WithFilter.
 */
trait WithFilter
{
    /**
     * The initial filters array.
     * @var array
     */
    public $filterfield = [];

    /**
     * @param $attribute
     * not used
     */
    public function filter($attribute, $type, $parentAttribute): void
    {
        $filterArray = $this->getFilterFieldValue($attribute, $parentAttribute);
        if($type === 'selectable'){
            $this->filterfield[$parentAttribute] = $filterArray ? []:[$attribute];
        }else{
            if(!array_key_exists($parentAttribute,$this->filterfield)){
                $this->filterfield[$parentAttribute] = [$attribute];
            }elseif(empty($this->filterfield[$parentAttribute])){
                array_push($this->filterfield[$parentAttribute],$attribute);
            }else{
                $filterArray ? $this->filterfield[$parentAttribute] = array_diff($this->filterfield[$parentAttribute],[$attribute]) : array_push($this->filterfield[$parentAttribute],$attribute);
            }
        }
    }

    /**
     * @param $field
     * @return mixed|null
     * not used
     */
    public function getFilterFieldValue($field, $parentAttribute)
    {
        if(array_key_exists($parentAttribute,$this->filterfield)){
            return in_array($field,$this->filterfield[$parentAttribute]) ? true : false;
        }
        return false;
        // return Arr::get($this->filterfield, $field, null);
    }

    /**
     * Resets the filter array.
     */
    public function clearFilter(): void
    {
        $this->reset('filterfield');
    }

    /**
     * Resets page to show filter from first page.
     */
    public function updatingFilterfield(): void
    {
        $this->resetPage();
    }

    /**
     * @param $attribute
     * @return mixed|bool
     */
    protected function getFilterByAttribute($parent, $attribute)
    {
        foreach ($this->filters() as $filter) {
            if($filter->getFilterAttribute() === $parent){
                foreach ($filter->getArrayOfFilter() as $filterItem) {
                    if ($filterItem->getFilterAttribute() === $attribute) {
                        return $filterItem;
                    }
                }
            }
        }
        return false;
    }
}
