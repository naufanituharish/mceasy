@props([
    'dropdownTitle' => '',
    'dropdownColor' => 'white',
    'dropdownItemProps' => [],
    'dropdownItemPullRight' => false,
    'useCarret' => true,

])
<div class="dropdown mr-2 mb-2">
    <a href="javascript:;" 
        {{$attributes->merge(['class' => 'btn btn-'.$dropdownColor.' dropdown-toggle' ])}}
        data-toggle="dropdown">
        <span>{{$dropdownTitle}}</span>
        @if ($useCarret)
            <b class="caret"></b>
        @endif
    </a>
    <div class="dropdown-menu {{$dropdownItemPullRight ? 'dropdown-menu-right' : null}} {{data_get($dropdownItemProps, 'class', null)}}" 
        role="menu" {{$attributes->merge($dropdownItemProps)}}>
        {{$slot}}
    </div>
</div>
