<div>
    <x-elements.modal.dialog wire:model="showModal" :modalWidth="$this->modalSize">
        <x-slot name="title">
            {{ $this->modalTitle }}
        </x-slot>
        <x-slot name="content">
            @if ($this->viewComponents)
                <x-elements.formatted-data :dataProps="$this->viewComponents"/>  
            @endif
            @if ($this->viewName)
                @livewire($this->viewName, $this->viewProperty, key("modal-view-".$this->viewName))
            @endif
        </x-slot>
        @if ($this->useFooter)
            <x-slot name="footer">
                @if ($this->useCloseButton)
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                @endif
                @if ($this->buttonActionMethod)
                    <button 
                        wire:loading.attr="disabled"
                        wire:click="$emitTo('{{$this->viewName}}', '{{$this->buttonActionMethod}}', '{{$this->buttonActionProperty}}' )" 
                        class="btn btn-primary">
                        {{ $this->buttonActionTitle }}
                    </button>
                @endif
            </x-slot>
        @endif
    </x-elements.modal.dialog>
</div>