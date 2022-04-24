@props(['tag' => 'div', 'todo' => false ])
<{{$tag}} {{ $attributes->merge(['class' => $todo ? 'widget-todolist-item':'widget-list-item']) }}>
    {{$slot}}
</{{$tag}}>