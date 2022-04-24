@props(['tag' => 'div', 'todo' => false])
<{{$tag}} {{ $attributes->merge(['class' => $todo ? 'widget-todolist ' : 'widget-list ' ]) }} >
    {{ $slot }}
</{{$tag}}>