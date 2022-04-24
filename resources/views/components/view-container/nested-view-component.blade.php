@props([
    'viewName' => '',
    'viewComponents' => [], 
    'inline' => false,
    'label' => '',
    'componentAttributes' => [],
    'useLabel' => false,
    'bordered' => false,
    'roundBorder' => true,
    ])

<div class="{{$bordered ? 'border '.($roundBorder ? 'rounded ': '') : ''}}{{ data_get($componentAttributes,'class', null) }}{{ $useLabel ? ' py-1' : ( $bordered ? " py-3" : '') }}{{ $inline ? '' : ( $bordered ? " px-3" : '')}}"
    {{ $attributes->merge($componentAttributes) }}>
    @if ($useLabel)
    <div class="field-label">
        <h6 class="f-w-500"><span class="field-title">{{ $label ?? null}}</span></h6>
    </div>
    @endif
    @if ($inline)
        <div class="row">
            @foreach ($viewComponents as $viewComponent)
                @if ($viewComponent->isVisible())
                    <div class="col-sm {{data_get($viewComponent->getColumnAttributes(),"class", null)}}" {{ $attributes->merge($viewComponent->getColumnAttributes()) }}>
                        <x-view-container.view-component :viewComponent="$viewComponent" :viewName="$viewName"/>
                    </div>
                @endif
            @endforeach        
        </div>        
    @else
        @foreach ($viewComponents as $viewComponent)
            @if ($viewComponent->isVisible())
                <x-view-container.view-component :viewComponent="$viewComponent" :viewName="$viewName"/>
            @endif
        @endforeach
    @endif
</div>
 