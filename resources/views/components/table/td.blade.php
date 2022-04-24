@props([
    'field'=>'',
    'isFormatted'=> false,
    'isRaw'=> false,
    'formatted',
    'value' => null,
    'isNested' => false,
    'nestedAttribute' => null,
    'tdAttributes',
    'tdId',
    'tdClass',
    ])

<td {{ $attributes->merge(array_merge([ "id" => $tdId, "class" => $tdClass], $tdAttributes)) }}>
    @if ($isNested)
        <div class="table-list clearfix">
            @if (data_get($value, $nestedAttribute, false))
                @if ($isFormatted)
                    <x-elements.formatted-data :isRaw="$isRaw" :dataProps="$formatted($value, $field)"/>
                @else
                    @if ($isRaw)
                        {!! data_get($value, $nestedAttribute) !!}
                    @else
                        {{ data_get($value, $nestedAttribute) }}
                    @endif
                @endif
            @else
                @if ($value)
                    @foreach ($value as $item)
                        @if ($isFormatted)
                            <x-elements.formatted-data :isRaw="$isRaw" :dataProps="$formatted($item, $field)"/>
                        @else
                            @if ($isRaw)
                                {!! data_get($item, $nestedAttribute) !!}
                            @else
                                {{ data_get($item, $nestedAttribute) }}
                            @endif
                        @endif
                        @if (!$isFormatted && $item !== $value->last() && $value->count() > 1)
                            ,
                        @endif
                    @endforeach
                @endif
            @endif
            
        </div>  
    @else
        @if ($isFormatted)
            <x-elements.formatted-data :isRaw="$isRaw" :dataProps="$formatted"/>
        @else
            @if ($isRaw)
                {!! $value !!}
            @else
                {{ $value }}
            @endif
        @endif
    @endif
</td>