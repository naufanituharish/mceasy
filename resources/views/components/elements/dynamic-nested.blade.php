@props(['componentWrapper' => [], 'componentArray' => [] ])
@if ($componentWrapper != [])
    <x-dynamic-component :component="$componentWrapper['componentName']" {{$attributes->merge($componentWrapper['componentAttributes'], false)}}>
        @foreach ($componentArray as $item)
            <x-elements.formatted-data :dataProps='$item' />
        @endforeach
    </x-dynamic-component>
@else
    @foreach ($componentArray as $item)
        <x-elements.formatted-data :dataProps='$item' />
    @endforeach
@endif