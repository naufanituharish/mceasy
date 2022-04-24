<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class ModalView extends Component
{
    public $modalSize;
    public $modalTitle;
    public $buttonActionTitle = 'Submit';
    public $buttonActionMethod;
    public $buttonActionProperty;
    public $viewName;
    public $viewComponents;
    public $viewProperty;
    public $showModal = false;
    public $useFooter = true;
    public $useCloseButton = true;

    protected $listeners = [
        'showModalView', 
        'hideModalView',
    ];

    public function showModalView(
        $viewName = null,
        $showProps = [],
        ...$params
    ){
        $modalProps = array_merge([
            'modalSize' => null,
            'modalTitle' => null,
            'viewComponents' => null,
            'buttonActionTitle' => 'Submit',
            'buttonActionMethod' => null,
            'buttonActionProperty' => null,
            'useFooter' => true,
            'useCloseButton' => true,
        ], $showProps);
        $this->viewName = $viewName;
        $this->viewProperty = [...$params];
        $this->modalSize = $modalProps['modalSize'] ?? '';
        $this->modalTitle = $modalProps['modalTitle'];
        $this->viewComponents = $modalProps['viewComponents'];
        $this->buttonActionTitle = $modalProps['buttonActionTitle'];
        $this->buttonActionMethod = $modalProps['buttonActionMethod'];
        $this->useFooter = $modalProps['useFooter'];
        $this->useCloseButton = $modalProps['useCloseButton'];
        $this->showModal = true;
    }

    public function hideModalView(){
        $this->reset([
            'buttonActionTitle',
            'buttonActionMethod',
            'buttonActionProperty',
            'viewName',
            'viewProperty',
            'modalTitle',
            'showModal',
        ]);
    }

    public function updatedShowModal($value)
    {
        if($value ==  false){
            $this->reset([
                'buttonActionTitle',
                'buttonActionMethod',
                'buttonActionProperty',
                'viewName',
                'viewProperty',
                'modalTitle',
                'showModal',
            ]);
        }
    }

    public function render()
    {
        return view('components.panels.modal-view');
    }
}
