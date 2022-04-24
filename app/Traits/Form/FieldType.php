<?php

namespace App\Traits\Form;

/**
 * Trait FieldType.
 */
trait FieldType
{
    /**
     * @var array
     */
    protected $arrayOfFields = [];

    /**
     * @var array
     */
    protected $fieldArray = [];

    /**
     * @var mixed
     */
    // protected $checkboxValue = null;

    /**
     * @param  string  $inputType
     * @param  array  $inputAttributes
     * @return $this
     */
    public function input(string $inputType = 'text', array $inputAttributes = []):self
    {
        $this->type = 'input';
        $this->fieldAttributes = array_merge($this->fieldAttributes, [ 'type' => $inputType ], $inputAttributes);
           
        return $this;
    }

    /**
     * @param  $selectOptions
     * @param  array  $selectAttributes
     * @return $this
     */
    public function select($selectOptions, array $selectAttributes =[] ):self
    {
        $this->type = 'select';
        $this->fieldArray = $selectOptions;
        $this->fieldAttributes = array_merge($this->fieldAttributes,$selectAttributes);
        return $this;
    }

    /**
     * @param  int  $textAreaRow
     * @param  array  $textAreaAttributes
     * @return $this
     */
    public function textarea(int $textAreaRow = 2, array $textAreaAttributes = []):self
    {
        $this->type = 'textarea';
        $this->fieldAttributes = array_merge($this->fieldAttributes,['rows' => $textAreaRow], $textAreaAttributes);
        return $this;
    }

    /**
     * @param  array  $textEditorAttributes
     * @return $this
     */
    public function texteditor(array $textEditorAttributes = []):self
    {
        $this->type = 'texteditor';
        $this->fieldAttributes = array_merge($this->fieldAttributes,$textEditorAttributes);
        return $this;
    }

    /**
     * @param  array  $radioAttributes
     * @return $this
     */
    public function radio($radioOptions,array $radioAttributes = []):self
    {
        $this->type = 'radio';
        $this->fieldArray = $radioOptions;
        $this->fieldAttributes = array_merge($this->fieldAttributes,$radioAttributes);
        return $this;
    }

    /**
     * @param  array  $checkboxAttributes
     * @return $this
     */
    public function checkbox( array $checkboxAttributes = []):self
    {
        $this->type = 'checkbox';
        // $this->checkboxValue = $checkboxValue;
        $this->fieldAttributes = array_merge($this->fieldAttributes,$checkboxAttributes);
        return $this;
    } 

    /**
     * @param  array  $datePickerAttributes
     * @return $this
     */
    public function datepicker( array $datePickerAttributes = []):self
    {
        $this->type = 'datepicker';
        $this->fieldAttributes = array_merge($this->fieldAttributes,$datePickerAttributes);
        return $this;
    }
    
    /**
     * @param  array  $arrayOfFields
     * @return $this
     */
    public function arrayOfFields(array $arrayOfFields = []):self
    {
        $this->type = 'array';
        $this->arrayOfFields = $arrayOfFields;
        return $this;
    } 

    /**
     * @return array
     */
    public function getArrayOfFields(): array
    {
        return $this->arrayOfFields;
    }
    
    /**
     * @return array
     */
    public function getFieldArray()
    {
        return $this->fieldArray;
    }


}
