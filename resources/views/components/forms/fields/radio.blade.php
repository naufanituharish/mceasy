@props([
    'formName' => 'form-radio',
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
            'class' => $inline ? 'col-form-label col-md-'.$leftColumn : null]) }}>{{ $label }}</label>
    @endif
    @if ($inline) <div class="col-md-{{$rightColumn}}"> @endif
        @if ($fieldArray)
            @foreach ($fieldArray as $key => $value)
                <div class="custom-control custom-radio mb-1">
                    <input value="{{$key}}" class="custom-control-input{{ ($inline ? ' m-b-5' : '') . ($errors->has($fieldProperty) ? ' is-invalid' : ''). ' '. data_get($fieldAttributes, 'class', null) }}"
                    {{ $attributes->merge(
                        array_merge(
                        [
                            'id'    => $formName.str_replace(".","-",$fieldProperty).'-'.$key,
                            'wire:model.'.$bindingMode => $fieldProperty,
                            'type' => 'radio',
                            'name' => $fieldProperty,
                        ],
                        $fieldAttributes)) }}/>
                    <label class="custom-control-label" for="{{$formName.str_replace(".","-",$fieldProperty).'-'.$key}}">{{$value}}</label>
                </div>
            @endforeach 
        @endif 
    @error($fieldProperty)
        <div class="invalid-feedback d-block pl-3" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    @if ($inline) </div> @endif
</div>