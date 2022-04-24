@props([ 'title', 'icon', 'text', 'type', 'alertClass' => null])
<div class="alert alert-{{$type}} m-b-0 {{$alertClass}}">
    <h6><i class="mr-2 {{ $icon }}"></i> {{ $title }}</h5>
    {{ $text ?? $slot }}
</div>