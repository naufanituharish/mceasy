<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\FormatedComponents;
use Illuminate\Support\Str;

class ButtonModalForm extends Component
{
    use FormatedComponents;
    public $text = 'Tambah';
    public $btnClass = 'btn btn-default btn-sm';
    public $formName = '';
    public $formMethod = '';
    public $modalProps = null; 
    
    public function render()
    {
        return view('components.elements.button-create');
    }
}