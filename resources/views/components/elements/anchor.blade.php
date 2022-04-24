@props(['iconClass' => null ,'text' => null])
<a {{ $attributes }}>
    @if ($iconClass)
        <i class="{{$iconClass}}"></i>
    @endif
    {{ $text ?? $slot }}
</a>
