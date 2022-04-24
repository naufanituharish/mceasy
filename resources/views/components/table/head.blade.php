@props(['columns' => null, 'isExtra' => false ])
@if (!empty($columns))
    <tr {{ $attributes }}>
        @foreach ($columns as $column)
            @if ($column->isVisible())
                @if (!$isExtra)
                    @if ($this->useIndex)
                        @if (!$this->indexWithoutHead)
                            @if ($columns[0] == $column)
                                <th {{ $attributes->merge($this->setThIndexAttributes()) }}>#</th>
                            @endif
                        @endif
                    @endif
                @endif
                @if ($column->isUseColHeader())
                    <x-table.th 
                        :sortable="$column->isSortable()"
                        :field="$column->getAttribute()"
                        :colspan="$column->getColSpan()"
                        :rowspan="$column->getRowSpan()"
                        :text="$column->getText()"
                    />
                @endif
            @endif
        @endforeach
    </tr>
@endif