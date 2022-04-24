<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Traits\Form\FieldValidation;
use App\Traits\Form\FieldStyles;

abstract class FormBase extends Component
{
    use FieldValidation, 
        FieldStyles;

    /**
     * @var bool
     */
    public $useFormWrapper = true;

    /**
     * @return string
     */
    public $formName;

    /**
     * @return array
     */
    abstract public function fields(): array;
        
    /**
     * List of listener
     * @var array
     */
    protected $listeners = [];

    /**
     * FormBase constructor.
     */
    public function __construct()
    {
        $this->formName = Str::kebab(class_basename(get_class($this)));   
        $this->listeners = array_merge($this->listeners, [
            'submit',
            'resetForm',
            'refreshForm' => '$refresh'
        ]);

    }

    /**
     * @return mixed
     */
    public function resetForm()
    {
        return null;
    }

    public function render()
    {
        return view('components.forms.base',[
            'fields' => $this->fields(),
        ]);
    }
}
