<?php

namespace App\Traits\Form;
use Illuminate\Support\Arr;

/**
 * Trait FieldType.
 */
trait FieldValidation
{
    /**
     * Model Validation Error Message.
     * @var array
     */
    protected $messages = [];

    /**
     * Realtime Validation.
     * @var array
     */
    protected $realtimeValidation = [];

    /**
     * Initialize Validation Rules.
     * @param array $fields
     */
    protected function setRules(array $fields = [])
    {
        $result = [];
        foreach ($fields as $field) {
            if(!$field->isHidden()){
                if($field->getRules() && $field->getType() !== 'array'){
                    $result[$field->getProperty()] = $field->getRules();
                    if($field->isRealtimeValidation()){
                        $this->realtimeValidation[$field->getProperty()] = true;
                    }
                }
                if($field->getType() === 'array'){
                    $result = array_merge($result,$this->setRules($field->getArrayOfFields()));
                }
            }
        }
        return $result;
    }

    /**
     * Model Validation Rules.
     * @return array
     */
    protected function rules()
    {
        $this->setErrorMessage($this->fields());
        return $this->setRules($this->fields());
    }

    /**
     * Initialize Error Message.
     * @param array $fields
     */
    protected function setErrorMessage(array $fields = [])
    {
        foreach ($fields as $field) {
            if(!$field->isHidden()){
                if(!empty($field->getErrorMessage()) && $field->getType() !== 'array'){
                    foreach($field->getErrorMessage() as $errorKey => $errorMessage){
                        $this->messages[$field->getProperty().'.'.$errorKey] = $errorMessage;
                    }
                }
                if($field->getType() === 'array'){
                    $this->setErrorMessage($field->getArrayOfFields());
                }
            }
        }
        // error_log(json_encode($this->messages));
    }

    /**
     * Realtime Validation check.
     * @param string $propertyName
     */
    public function updated($propertyName)
    {
        if(Arr::exists($this->realtimeValidation, $propertyName)){
            $this->validateOnly($propertyName);
        }
    }
}
