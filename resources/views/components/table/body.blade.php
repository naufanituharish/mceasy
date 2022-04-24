@props(['models' => null, 'columns' => null, 'bodyClass' => ''])
@php
    $tableIndex = $this->page > 1 ? ($this->page - 1) * $this->perPage : 0;
    $tableLength = collect($columns)->count();
@endphp
<tbody class="{{$bodyClass}}">
    @if($models->isEmpty())
        <tr>
            <td colspan="{{ $this->useIndex ? $tableLength+1 : $tableLength  }}" class="text-center"><h5>Tidak ada data!</h5></td>
        </tr>
    @else
        @foreach($models as $model)
            <tr {{ $attributes->merge(array_merge([ 
                    "id"    => $this->setTableRowId($model),
                    "class" => $this->setTableRowClass($model)],
                    $this->setTableRowAttributes($model))) }}>
                @foreach($columns as $column)
                    @if ($column->isVisible())
                        @if ($this->useIndex)
                            @if ($columns[0] == $column)
                                <td {{ $attributes->merge($this->setTableIndexAttributes()) }}>{{++$tableIndex}}</td>
                            @endif
                        @endif
                        @if ($column->isTdShown())
                            <x-table.td
                                :field="$column->getAttribute()"
                                :isFormatted="$column->isFormatted()"
                                :isRaw="$column->isRaw()"                        
                                :formatted="$column->isNested() ? fn($mdl, $col) => $column->formatted($mdl, $col) : ( $column->isFormatted() ? $column->formatted($model, $column) : null)"                        
                                :value="data_get($model, $column->isNested() ? $column->getNestedAttribute()[0] : $column->getAttribute())"
                                :isNested="$column->isNested()"
                                :nestedAttribute="$column->isNested() ? $column->getNestedAttribute()[1] : null"
                                :tdAttributes="$this->setTableDataAttributes($column->getAttribute(), data_get($model, $column->getAttribute()))"                        
                                :tdId="$this->setTableDataId($column->getAttribute(), data_get($model, $column->getAttribute()))"                        
                                :tdClass="$this->setTableDataClass($column->getAttribute(), data_get($model, $column->getAttribute()))"                        
                            />
                        @endif
                    @endif
                @endforeach
            </tr>
        @endforeach
    @endif
</tbody>