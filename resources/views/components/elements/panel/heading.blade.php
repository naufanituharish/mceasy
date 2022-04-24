@props(['title' => null])
<div {{$attributes->merge(['class' => ' panel-heading '])}}>
    @if ($title)
        <h4 class="panel-title">{{$title}}</h4>
    @endif
    {{ $slot }}
</div>