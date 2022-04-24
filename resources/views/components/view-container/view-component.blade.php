@props(['viewComponent' => null, 'viewContainerName' => ''])
@switch($viewComponent->getType())
    @case('livewire')
        @livewire($viewComponent->getComponentName(), $viewComponent->getComponentAttributes(), key($viewComponent->getComponentKey() ?? ($viewContainerName.'-'.$viewComponent->getComponentName().'-'.$viewComponent->getText())))
        @break

    @case('blade')            
        <x-dynamic-component :component="$viewComponent->getComponentName()" {{$attributes->merge($viewComponent->getComponentAttributes(), false)}}>
            @if ($viewComponent->getCustomSlots())
                @foreach ($viewComponent->getCustomSlots() as $item)
                    <x-slot :name="$item['name']">
                        @foreach ($item['components'] as $component)
                            <x-view-container.view-component 
                                :viewContainerName="$viewContainerName"
                                :viewComponent="$component"/>
                        @endforeach
                    </x-slot>
                @endforeach
            @endif
            @if ($viewComponent->getBladeComponents())
                @foreach ($viewComponent->getBladeComponents() as $item)
                    <x-view-container.view-component 
                        :viewName="$viewContainerName"
                        :viewComponent="$item"/>
                @endforeach
            @endif
        </x-dynamic-component>
        @break
    @case('array')
        <x-view-container.nested-view-component 
            :viewName="$viewContainerName"
            :label="$viewComponent->getText()"
            :useLabel="$viewComponent->isUseLabel()"
            :viewComponents="$viewComponent->getArrayOfComponents()" 
            :inline="$viewComponent->isInline()"
            :componentAttributes="$viewComponent->getComponentAttributes()"
            :roundBorder="$viewComponent->isRoundBorder()"        
            :bordered="$viewComponent->isBordered()"/>
        @break
    @case('html')
        {{$viewComponent->getRawResult()}}
        @break
    @case('raw')
        {!!$viewComponent->getRawResult()!!}
        @break
    @default
        {{ $viewComponent->getText() }}
@endswitch