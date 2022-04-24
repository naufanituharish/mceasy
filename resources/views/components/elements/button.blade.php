@props(['iconClass' => null, 'text' => null, 'type' => 'button'])
<button {{ $attributes->merge([ 'type' => $type ]) }}>
    @if ($iconClass)
        <i class="{{ $iconClass }}"></i>
    @endif
    {{ $text ?? $slot }}
</button>
