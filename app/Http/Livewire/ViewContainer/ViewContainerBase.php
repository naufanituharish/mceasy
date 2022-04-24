<?php

namespace App\Http\Livewire\ViewContainer;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Traits\ViewContainer\ViewContainerProps;

abstract class ViewContainerBase extends Component
{
    use ViewContainerProps;

    /**
     * @return string
     */
    public $viewContainerName;

    /**
     * @return array
     */
    abstract public function viewComponents(): array;
        
    /**
     * List of listener
     * @var array
     */
    protected $listeners = [];

    /**
     * ViewPanelBase constructor.
     */
    public function __construct()
    {  
        $this->viewContainerName = Str::kebab(class_basename(get_class($this)));   
        $this->listeners = array_merge($this->listeners, ['refreshViewContainer' => '$refresh']);

    }

    public function render()
    {
        return view('components.view-container.wrapper',[
            'viewComponents' => $this->viewComponents(),
        ]);
    }
}
