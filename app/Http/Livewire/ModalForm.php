<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class ModalForm extends Component
{
    public $modalSize;
    public $modalTitle;
    public $buttonActionTitle = 'Simpan';
    public $formName;
    public $formMethod;
    public $formProperty;
    public $showModalForm = false;
    public $useFooter = true;
    public $useSubmitButton = true;

    protected $listeners = [
        'showModalForm', 
        'hideModalForm',
    ];

    public function showModalForm(
        $formName,
        $showProps = [],
        $formMethod,
        ...$params
    ){
        $modalFormProps = array_merge([
            'modalSize' => null,
            'modalTitle' => null,
            'buttonActionTitle' => 'Simpan',
            'useFooter' => true,
            'useSubmitButton' => true,
        ], $showProps ?? []);

        $kebabTitle = Str::kebab($formMethod);
        $this->formName = $formName;
        $this->formMethod = $formMethod;
        $this->modalSize = $modalFormProps['modalSize'] ?? '';
        $this->modalTitle = $modalFormProps['modalTitle'] ?? Str::of($kebabTitle)->replace('-', ' ')->title()." Form";
        $this->buttonActionTitle = $modalFormProps['buttonActionTitle'];
        $this->useFooter = $modalFormProps['useFooter'];
        $this->useSubmitButton = $modalFormProps['useSubmitButton'];
        $this->formProperty = [$formMethod,...$params];
        $this->showModalForm = true;
    }

    public function updatedShowModalForm($value)
    {
        if($value ==  false){
            $this->reset([
                'buttonActionTitle',
                'modalTitle',
                'formName',
                'formMethod',
                'formProperty',
                'showModalForm',
                'useFooter',
                'useSubmitButton',
            ]);
        }
    }

    public function hideModalForm(){
        $this->reset([
            'buttonActionTitle',
            'modalTitle',
            'formName',
            'formMethod',
            'formProperty',
            'showModalForm',
            'useFooter',
            'useSubmitButton',
        ]);
    }

    public function submitForm(){
        $this->emitTo('form.'.$this->formName, 'submit');
    }

    public function render()
    {
        return view('components.panels.modal-form');
    }
}