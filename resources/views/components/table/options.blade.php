@props([
    'tableName'         => 'livewire',
    'paginationEnabled' => false, 
    'searchEnabled'     => false, 
    'searchWidth'       => 180,
    'displayPerpage'    => false, 
    'perPageOptions'    => [],
    'searchPlaceHolder' => 'Search',
    'filterField'       => [],
    ])

@if ($paginationEnabled || $searchEnabled)
    <div class="d-block d-md-flex align-items-center {{ $displayPerpage || $searchEnabled || !empty($filterField) ? 'mb-3' : null}}">
        @if ($paginationEnabled || $filterField)
            <div class="d-flex flex-wrap">
                @if ($paginationEnabled && $displayPerpage)
                    <div class="dropdown mr-2 mb-2">
                        <a class="btn btn-white btn-white-without-border dropdown-toggle" data-toggle="dropdown">
                            Tampil {{ $this->perPage }} data <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            @foreach ($perPageOptions as $option)
                                <a href="javascript:;" wire:click="$set('perPage', {{$option}})" class="dropdown-item" >{{ $option }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($filterField)         
                    @foreach ($filterField as $filters)
                        <x-table.filters 
                            :filters="$filters->getArrayOfFilter()" 
                            :title="$filters->getFilterText()" 
                            :filterAttribute="$filters->getFilterAttribute()"
                            :filterType="$filters->getFilterType()"/>                
                    @endforeach
                @endif 
            </div>
        @endif
        @if ($searchEnabled)
            <div class="ml-auto d-block">
                <x-table.search 
                    :tableName="$tableName" 
                    :searchPlaceHolder="$searchPlaceHolder" 
                    :searchWidth="$searchWidth"/>
            </div>
        @endif
    </div>
@endif
