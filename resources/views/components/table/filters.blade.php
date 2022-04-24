@props([
    'filters' => [], 
    'title' => '',
    'filterAttribute' => '',
    'filterType' => '',
])
<div class="form-group mr-2">
    <select class="selectpicker form-control"
            title="{{$title}}"
            {{ $attributes->merge([
                'multiple' => $filterType == 'multiple' ? 'true' : null,
                'data-live-search' => count($filters) >= 10 ? 'true': null,
            ]) }}
            wire:model="filterfield.{{$filterAttribute}}"
            data-selected-text-format="static"
            data-style="btn-white border-0"
            x-data=""
            x-ref="selectOptions"
            x-init="()=>{
                var elm = $($refs.selectOptions);
                elm.selectpicker('render');
                Livewire.hook('message.received', (message, component) => { 
                    elm.selectpicker('destroy') 
                }); 
                Livewire.hook('message.processed', (message, component) => { 
                    elm.selectpicker('render');
                })
            }">
            <option class="text-grey" {{ $attributes->merge([
                'disabled' => $filterType == 'multiple' ? true : null,
            ]) }}>{{$filterType == 'multiple' ? 'Pilih Filter' : 'Clear Filter'}}</option> 
            @foreach ($filters as $filter)
                <option value="{{$filter->getFilterAttribute()}}" >{{$filter->getFilterText()}}</option>
            @endforeach           
    </select>
</div>