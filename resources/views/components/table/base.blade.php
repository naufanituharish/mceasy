@props(['extraAttributes' => []])
<table {{ $attributes->merge(array_merge(['class' => 'table m-b-0'], $extraAttributes)) }}>
    {{ $slot }}
</table>