@props([
    'formName' => 'form-select',
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

<div class="form-group{{ $inline ? ' row m-b-15' : null }} {{data_get($formGroupExtra, 'class', null)}}" {{ $attributes->merge($formGroupExtra)}}>
    @if ($useLabel)
        <label {{ $attributes->merge([ 
            'for' => $formName.str_replace(".","-",$fieldProperty), 
            'class' => $inline ? 'col-form-label col-md-'.$leftColumn : null]) }}>{{ $label }}</label>
    @endif
    @if ($inline) <div class="col-md-{{$rightColumn}}"> @endif
        <select class="{{ data_get($fieldAttributes, 'selectcheckbox', null) ? 'selectcheckbox' : 'selectpicker' }} form-control {{ ($errors->has($fieldProperty) ? ' is-invalid' : '') }}"
            {{ $attributes->merge(
                array_merge(
                    [
                        'id'    => $formName.str_replace(".","-",$fieldProperty),
                        'wire:model.'.$bindingMode => $fieldProperty,
                    ],
                    data_get($fieldAttributes, 'selectcheckbox', false) ? [
                        'data-selected-delimiter' => ',',
                        'data-search' => $liveSearch ? 'true' : null,
                    ] : 
                    [
                        
                        'title' => $placeholder,                    
                        'data-live-search' => $liveSearch ? 'true' : null, 
                        'data-style' => data_get($fieldAttributes, 'class', null) ?? 'btn-white ',
                    ],
                $fieldAttributes)) }}
                x-data=""
                x-ref="selectOptions"
                x-init="()=>{
                    var elm = $($refs.selectOptions);
                    var isSelectCheckBox = {{ data_get($fieldAttributes, 'selectcheckbox', 0)}}; 

                    if(isSelectCheckBox){
                        elm.customselect();
                    }else{
                        elm.selectpicker('render');
                    }
                    Livewire.hook('message.received', (message, component) => { 
                        if(isSelectCheckBox){
                            elm.customselect('destroy') 
                        }else{
                            elm.selectpicker('destroy') 
                        }
                    }); 
                    Livewire.hook('message.processed', (message, component) => { 
                        if(isSelectCheckBox){
                            elm.customselect(); 
                        }else{
                            elm.selectpicker('render');
                        }
                    })
                }">
                @if ($usePrependIndex)
                    <option class="text-grey" value="">{{$placeholder}}</option>    
                @endif
                @if ($fieldArray)
                    @if ($useIndex)
                        @foreach ($fieldArray as $item)
                            <option value="{{data_get($item,$useIndex[0])}}" >
                                @for ($i = 1; $i < count($useIndex); $i++)
                                    @if ($i > 1)
                                        ({{data_get($item,$useIndex[$i])}})                                       
                                    @else
                                        {{data_get($item,$useIndex[$i])}}
                                    @endif
                                @endfor
                            </option>
                        @endforeach
                    @else
                        @foreach ($fieldArray as $item)
                            <option >{{$item}}</option>
                        @endforeach
                    @endif 
                @endif            
        </select>
    @error($fieldProperty)
        <div class="invalid-feedback {{ data_get($fieldAttributes, 'selectcheckbox', null) ? 'd-block' : '' }}" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    @if ($inline) </div> @endif
</div>

