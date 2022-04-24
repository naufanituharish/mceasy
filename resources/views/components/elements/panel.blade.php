@props([
    'title'       => null,
    'heading'     => null,
    'panelType'   => 'inverse',
    'panelClass'   => '',
    'bodyClass'   => null,
    'body'        => null,
    'footer'      => null,
    'footerClass' => null,
])

<div {{ $attributes->merge(['class' => 'panel panel-'.$panelType.' '.$panelClass]) }}>
    @if ($title || $heading)
        <x-elements.panel.heading :title="$title">
            {{ $heading }}
        </x-elements.panel.heading>
    @endif
    @if ($body)
        <x-elements.panel.body :class="$bodyClass">
            {{ $body }}
        </x-elements.panel.body>	
    @endif	
    @if ($footer)
        <x-elements.panel.footer :class="$footerClass">
            {{ $footer }}
        </x-elements.panel.footer>	
    @endif
    {{$slot}}
</div>