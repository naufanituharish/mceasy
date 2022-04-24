@props(['id', 'modalWidth' => '', 'modal' => false])

@php
$id = $id ?? md5($attributes->wire('model'));

switch ($modalWidth) {
    case 'sm':
        $modalWidth = ' modal-sm';
        break;
    case 'md':
        $modalWidth = '';
        break;
    case 'lg':
        $modalWidth = ' modal-lg';
        break;
    case 'xl':
        $modalWidth = ' modal-xl';
        break;
    case '2xl':
    default:
        $modalWidth = '';
        break;
}
@endphp

<!-- Modal -->
<div 
    x-data="{
        show: @entangle($attributes->wire('model')),
    }"
    x-init="() => {
        let modal = $('#{{ $id }}');
        $watch('show', value => {
            if (value) {
                modal.modal('show')
            } else {
                modal.modal('hide')
            }
        });

        modal.on('hide.bs.modal', function () {
            show = false
        });
    }"
    wire:ignore.self 
    class="modal fade" 
    tabindex="-1" 
    id="{{ $id }}" 
    aria-labelledby="{{ $id }}" 
    aria-hidden="true"
    x-ref="{{ $id }}"
>
    <div class="modal-dialog {{ $modalWidth }}">
        {{ $slot }}
    </div>
</div>
