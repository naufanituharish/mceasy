@props([
    'title' => null, 
    'titleClass' => null,
    'titleDesc' => null,
    'titleDescClass' => null,
    'todo' => false,
    'icon' => null,
    'type' => 'content',
    'tag' => 'div'
])
<{{$tag}} {{ $attributes->merge(['class' => 'widget-'.($todo ? 'todolist':'list').'-'.$type.($icon ? ($type == 'action' ? null : ' icon') : null) ]) }}>
    @if ($title)
        @if ($type === 'action') 
            {{$title}}
        @else
            <h4 class="widget-{{$todo ? 'todolist':'list'}}-title {{$titleClass}}">{{$title}}</h4>
        @endif
        
    @endif
    @if ($titleDesc)
        <p class="widget-{{$todo ? 'todolist':'list'}}-desc {{$titleDescClass}}">{{$titleDesc}}</p>
    @endif
    @if ($icon)
        <i class="{{$icon}}"></i>
    @endif
    {{$slot}}
</{{$tag}}>