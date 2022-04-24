@props([
    'formName' => 'form-input',
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
            'for' => $formName.str_replace(".","-",$fieldProperty), 
            'class' => $inline ? 'col-form-label col-md-'.$leftColumn : null]) }}>{{ $label }}</label>
    @endif
    @if ($inline) <div class="col-md-{{$rightColumn}}"> @endif
        <input class="form-control{{ ($inline ? ' m-b-5' : '') . ($errors->has($fieldProperty) ? ' is-invalid' : ''). ' '. data_get($fieldAttributes, 'class', null) }}"
            {{ $attributes->merge(
                array_merge(
                [
                    'id'    => $formName.str_replace(".","-",$fieldProperty),
                    'wire:model.'.$bindingMode => $fieldProperty,
                ],
                $fieldAttributes)) }}/>
        @error($fieldProperty)
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    @if ($inline) </div> @endif
</div>