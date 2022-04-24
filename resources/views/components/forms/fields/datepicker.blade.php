@props([
    'formName' => 'form-date-picker',
    'label' => '',
    'useLabel' => true,
    'fields' => [],
    'inline' => false,
    'fieldProperty' => '',
    'fieldAttributes' => [],
    'fieldArray' => null,
    'bindingMode' => '',
    'isMultiple' => '',
    'placeholder' => '',
    'usePrependIndex' => false,
    'formGroupExtra' => [],
    'useIndex' => [],
    'liveSearch' => true,
    'leftColumn' => 4,
    'rightColumn' => 8,
])
    
<div class="form-group{{ $inline ? ' row m-b-15' : null}} {{data_get($formGroupExtra, 'class', null)}}" {{ $attributes->merge($formGroupExtra)}}>
    @if ($useLabel)
        <label {{ $attributes->merge([ 
            'for' => 'date-picker-'.$formName.'-'.str_replace(".","-",$fieldProperty), 
            'class' => $inline ? 'col-form-label col-md-'.$leftColumn : null]) }}>{{ $label }}</label>
    @endif
    @if ($inline) <div class="col-md-{{$rightColumn}}"> @endif
        <input class="form-control datepicker{{ ($inline ? ' m-b-5' : '') . ($errors->has($fieldProperty) ? ' is-invalid' : ''). ' '. data_get($fieldAttributes, 'class', null) }}"
            {{ $attributes->merge(
                array_merge(
                [
                    'type'      => 'text',
                    'id'        => 'date-picker-'.$formName.'-'.str_replace(".","-",$fieldProperty),
                    'wire:model.'.$bindingMode => $fieldProperty,
                ],
                $fieldAttributes)) }}
            x-data=""
            x-ref="datePicker"
            onchange="this.dispatchEvent(new InputEvent('input'))"
            x-init="()=>{
                var elm = $($refs.datePicker);
                var bindingMode = '{{$bindingMode}}';
                if(bindingMode == 'lazy'){
                    elm.datepicker().on('hide', function(e) {
                        e.stopPropagation();
                    }).on('change', function(e) {
                        $wire.set('{{$fieldProperty}}', this.value)
                    });
                }else{
                    elm.datepicker().on('hide', function(e) {
                        e.stopPropagation();
                    });
                }
                Livewire.hook('message.received', (message, component) => { 
                    elm.datepicker('destroy');
                }); 
                Livewire.hook('message.processed', (message, component) => { 
                    elm.datepicker().on('hide', function(e) {
                        e.stopPropagation();
                    });
                })
            }"
        />
    @error($fieldProperty)
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    @if ($inline) </div> @endif
</div>

