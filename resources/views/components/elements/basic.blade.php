@props(['tag' => 'div', 'text' => null])
<{{$tag}} {{ $attributes}} >
    {{ $text ?? $slot }}
</{{$tag}}>