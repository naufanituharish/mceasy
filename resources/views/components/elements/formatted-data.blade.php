@props(['dataProps','isRaw' => false])

@if (data_get($dataProps, 'componentType', false))
    @switch($dataProps['componentType'])
        @case('image')
            <img {{ $attributes->merge($dataProps['componentAttributes']) }} />
            @break

        @case('link')
            <a {{ $attributes->merge($dataProps['componentAttributes']) }} >{{$dataProps['componentText']}} <i class="fa fa-link fa-fw m-l-5"></i></a>
            @break

        @case('email')
            <a {{ $attributes->merge($dataProps['componentAttributes']) }} >{{$dataProps['componentText']}}<i class="fa fa-envelope fa-fw m-l-5"></i></a>
            @break

        @case('menu')            
            <x-elements.menu :menuText="$dataProps['menuText']" :menuAttributes="$dataProps['menuAttributes']"/>
            @break
        
        @case('livewire')
            @livewire($dataProps['componentName'], $dataProps['componentAttributes'], key($dataProps['componentKey']))
            @break
        
        @case('blade')            
            <x-dynamic-component :component="$dataProps['componentName']"  {{$attributes->merge($dataProps['componentAttributes'], false)}} />
            @break

        @case('array')
            <x-elements.dynamic-nested :componentWrapper="$dataProps['componentWrapper']" :componentArray="$dataProps['componentArray']"/>
            @break
            
        @case('html')
            {{ $dataProps['componentResult'] }}
            @break

        @default
            {{ $dataProps }}
        
    @endswitch
@else
    @if ($isRaw)
        {!! $dataProps !!}
    @else
        {{ $dataProps }}
    @endif
@endif