@props([
    'footerAttributes' => [],
    'btnLeftText' => '', 
    'btnLeftAttributes' => [],
    'btnRightText' => '', 
    'btnRightAttributes' => []
    ])
<div class="modal-footer {{ data_get($footerAttributes, 'class', null) }}" 
    {{ $attributes->merge($footerAttributes) }} >
    <button class="btn {{ data_get($btnLeftAttributes, 'class', null)}}" 
        {{ $attributes->merge(array_merge([
            'data-dismiss' => "modal" 
        ],$btnLeftAttributes)) }}>{{ $btnLeftText }}</button>
    <button class="btn {{ data_get($btnRightAttributes, 'class', null)}}"  
        {{ $attributes->merge(array_merge([
            'type' => data_get($btnRightAttributes, 'type', null) ?? "button" 
        ],$btnRightAttributes)) }}>
        {{ $btnRightText }}
    </button>
</div>