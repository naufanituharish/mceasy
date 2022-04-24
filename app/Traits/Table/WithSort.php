<?php

namespace App\Traits\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * Trait WithSort.
 */
trait WithSort
{
    /**
     * The initial field to be sorting by.
     * @var array
     */
    public $sortfield = [];

    /**
     * @param $attribute
     */
    public function sort($attribute): void
    {
        $field = $this->getSortFieldValue($attribute);
        if($field){
            $field === 'asc' ? $this->sortfield[$attribute] = 'desc' : $this->sortfield[$attribute] = 'asc';
            // $field === 'asc' ? Arr::set($this->sortfield, $attribute, 'desc') : Arr::set($this->sortfield, $attribute, 'asc');
        }else{
            $this->sortfield[$attribute] = 'asc';
            // Arr::set($this->sortfield, $attribute, 'asc');
        }
    }

    public function getSortFieldValue($field)
    {
        if(array_key_exists($field, $this->sortfield)){
            return $this->sortfield[$field];
        }
        return null;
        // return Arr::get($this->sortfield, $field, null);
    }

    /**
     * Resets the sort array.
     */
    public function clearSort(): void
    {
        $this->reset('sortfield');
    }

    /**
     * @param  mixed  Builder  $builder, srting $sortField
     * @return string
     */
    protected function sortHasRelation(Builder $builder, string $sortField): string
    {
        if (Str::contains($sortField, '.')) {
            $relationship = $this->relationship($sortField);

            return $this->attribute($builder, $relationship->name, $relationship->attribute);
        }
        return $sortField;
    }
}
