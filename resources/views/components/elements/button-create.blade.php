<div class="btn-group">
    <button 
        class="{{$this->btnClass}}" 
        wire:click="$emitTo('modal-form', 'showModalForm', '{{$this->formName}}',{{$this->modalProps ? json_encode($this->modalProps): null}}, '{{$this->formMethod}}')"
        wire:loading.attr="disabled">
        <i class="fas fa-spinner fa-pulse" wire:loading></i>
        {{$this->text}}
    </button>
</div>