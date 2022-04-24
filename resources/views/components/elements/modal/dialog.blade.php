@props(['id' => null, 'modalWidth', 'footer' => null])

<x-elements.modal.base :id="$id" :modalWidth="$modalWidth" {{ $attributes }}>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{ $content ?? null }}
        </div>
        @if ($footer)
            <div class="modal-footer py-3">
                {{ $footer ?? null }}
            </div>
        @endif
    </div>
</x-elements.modal.base>
