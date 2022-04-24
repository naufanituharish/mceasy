@props([
    'sortable' => false, 
    'field'=> '', 
    'colspan' => '', 
    'rowspan' => '', 
    'text' => ''
    ])

<th 
    {{ $attributes->merge(array_merge([ 
        "class" => $this->setThClass($field),
        "id"    => $this->setThId($field),
        "wire:click" => $sortable ? "sort('".$field."')" : null,
        "style" => $sortable ? "cursor:pointer;" : null,
        "colspan" => $colspan,
        "rowspan" => $rowspan
        ],$this->setThAttributes($field))) }}>
    {{ $text }}
    @if ($sortable)
        <x-table.sort-icon :field="$field"/>
    @endif
</th>