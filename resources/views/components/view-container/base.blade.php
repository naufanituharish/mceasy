@props(['viewComponents' => [], 'isUseLoading' => false])
<div class="loader-base" @if ($isUseLoading) wire:loading.class="loader-loading" @endif >
    @if ($isUseLoading)
        <div class="loader-loader" wire:loading><span class="spinner-small"></span></div>
    @endif
    @if ($this->wrapperName)
        <x-dynamic-component 
            :component="$this->wrapperName"  {{$attributes->merge($this->wrapperProps, false)}}>
            @foreach ($viewComponents as $viewComponent)
                @if ($viewComponent->isVisible())
                    <x-view-container.view-component :viewComponent="$viewComponent" :viewContainerName="$this->viewContainerName"/>
                @endif
            @endforeach 
        </x-dynamic-component>
    @else
        @foreach ($viewComponents as $viewComponent)
            @if ($viewComponent->isVisible())
                <x-view-container.view-component :viewComponent="$viewComponent" :viewContainerName="$this->viewContainerName"/>
            @endif
        @endforeach 
    @endif
       
</div>
