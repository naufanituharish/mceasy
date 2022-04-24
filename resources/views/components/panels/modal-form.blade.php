<div>
    <x-elements.modal.dialog wire:model="showModalForm" :modalWidth="$this->modalSize">
        <x-slot name="title">
            {{ $this->modalTitle }}
        </x-slot>
        <x-slot name="content">
            @if ($this->formName)
                @livewire('form.'.$this->formName, $this->formProperty, key("modal-form-".$this->formName))
            @endif            
        </x-slot>
        @if ($this->useFooter)
            <x-slot name="footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                @if ($this->useSubmitButton)
                    <button 
                        wire:loading.attr="disabled"
                        wire:click="$emitTo('form.{{$this->formName}}', 'submit', '{{$this->formMethod}}' )" 
                        class="btn btn-primary">
                        {{ $this->buttonActionTitle }}
                    </button>
                @endif
            </x-slot>
        @endif
    </x-elements.modal.dialog>
</div>

