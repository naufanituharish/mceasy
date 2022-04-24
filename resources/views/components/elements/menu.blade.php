@props(['menuText' => 'Menu', 'menuAttributes' => []])

<div class="btn-group">
    @if ($menuText !== '')
        <a class="btn btn-white btn-xs width-90 disabled">{{ __($menuText) }}</a>
    @endif
    <a href="javascript:;" title="Menu" class="btn btn-default no-border btn-xs dropdown-toggle width-30 no-caret" data-toggle="dropdown" data-boundary="viewport">
        <span> <i class="fa fa-ellipsis-v"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right pull-right">
        @foreach ($menuAttributes as $item)
            @if (!$item->isHidden())
                @if ($item->getType() == 'button')
                    <a class="dropdown-item" {!! $attributes->merge($item->getAttributes()) !!}>{{ $item->getText() }}</a>
                @else
                    @if ($item->getType() == 'livewire')
                        @livewire($item->getComponentName(), $item->getAttributes(), key($item->getComponentKey()) )
                    @else
                        <div class="dropdown-divider"></div>
                    @endif
                @endif
            @endif
        @endforeach
    </div>
</div>