@props([
    'formName' => 'form-checkbox',
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

<div class="checkbox checkbox-css m-b-20 m-t-10">
    <input 
        {{ $attributes->merge(
            array_merge(
            [
                'id'        => $formName.str_replace(".","-",$fieldProperty),
                'type'      => 'checkbox',
                'wire:model.'.$bindingMode => $fieldProperty,
                'class'     => $errors->has($fieldProperty) ? ' is-invalid' : '',
            ],
            $fieldAttributes)) }}/>
    <label {{ $attributes->merge([ 
        'for' => $formName.str_replace(".","-",$fieldProperty)]) }}>{{ $label }}</label>
    @error($fieldProperty)
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>