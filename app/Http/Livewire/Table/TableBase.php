<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Traits\Table\PaginationOptions;
use App\Traits\Table\TableOptions;
use App\Traits\Table\TableStyle;
use App\Traits\Table\WithFilter;
use App\Traits\Table\WithSearch;
use App\Traits\Table\WithSort;
use App\Traits\WithRelationBuilder;

abstract class TableBase extends Component
{
    use TableOptions,
        TableStyle,
        PaginationOptions,
        WithFilter,
        WithPagination,
        WithRelationBuilder,
        WithSearch,
        WithSort;

    /**
     * The default pagination theme.
     * @var string
     */
    public $paginationTheme = 'bootstrap';

    /**
     * The list of listener.
     * @var string
     */
    protected $listeners = [];

    /**
     * The list of listener.
     * @var string
     */
    public $initialColumnSort = 'id';

    /**
     * The list of listener.
     * @var string
     */
    public $initialSort = 'desc';

    /**
     * Initial Page.
     * @var string
     */
    public $page = 1;

    /**
     * Initial state QueryString.
     * @var string
     */
    protected $queryString = [
        'search'    => ['except' => ''],
        'page'      => ['except' => 1],
    ];

    /**
     * TableName.
     * @var string
     */
    public $tableName;

    /**
     * Whether or not to display an offline message when there is no connection.
     * @var bool
     */
    public $offlineIndicator = true;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    abstract public function query(): Builder;

    /**
     * @return array
     */
    abstract public function columns(): array;
    
    /**
     * @return array
     */
    public function footer(): array{
        return [];
    }
    
    /**
     * @return array
     */
    public function extraHeader(): array{
        return [];
    }

    /**
     * @return array
     */
    public function filters(): array{
        return [];
    }

    /**
     * @return array
     */
    public function extraComponent(): array{
        return [];
    }

    /**
     * @return array
     */
    public function extraComponentBottom(): array{
        return [];
    }

    /**
     * TableBase constructor.
     */
    public function __construct()
    {
        // $this->fill(request()->only('search', 'page'));
        $this->setTableConfig($this->tableConfig);
        $this->listeners = array_merge($this->listeners, ['refreshTable' => '$refresh']);
        $this->tableName = Str::kebab(class_basename(get_class($this)));
    }

    public function render()
    {
        return view('components.table.wrapper',[
            'columns' => $this->columns(),
            'models' => $this->paginationEnabled ? $this->models()->paginate($this->perPage) : $this->models()->get(),
            'filters' => $this->filters(),
            'footerColumns' => $this->footer(),
            'extraHeaderColumns' => $this->extraHeader(),
            'extraComponent' => $this->extraComponent(),
            'extraComponentBottom' => $this->extraComponentBottom(),
        ]);
    }

    /**
     * @return Builder
     */
    public function models(): Builder
    {
        $builder = $this->query();
        if(!empty($this->filterfield)){
            foreach($this->filterfield as $key => $filterfield){
                if(is_array($filterfield)){
                    foreach($filterfield as $fieldFilter){
                        if (($filter = $this->getFilterByAttribute($key, $fieldFilter)) !== false && is_callable($filter->getFilterCallback())) {
                            $builder = app()->call($filter->getFilterCallback(), ['builder' => $builder, 'field' => $fieldFilter]);
                        }
                    }
                }else{
                    if (($filter = $this->getFilterByAttribute($key, $filterfield)) !== false && is_callable($filter->getFilterCallback())) {
                        $builder = app()->call($filter->getFilterCallback(), ['builder' => $builder, 'field' => $filterfield]);
                    }
                }
            }
        }
        
        if ($this->searchEnabled && trim($this->search) !== '') {
            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if ($column->isSearchable()) {
                        if (is_callable($column->getSearchCallback())) {
                            $builder = app()->call($column->getSearchCallback(), ['builder' => $builder, 'term' => trim($this->search)]);
                        } elseif (Str::contains($column->getAttribute(), '.')) {
                            $relationship = $this->relationship($column->getAttribute());

                            $builder->orWhereHas($relationship->name, function (Builder $builder) use ($relationship) {
                                $builder->where($relationship->attribute, 'like', '%'.trim($this->search).'%');
                            });
                        } else {
                            $builder->orWhere($builder->getModel()->getTable().'.'.$column->getAttribute(), 'like', '%'.trim($this->search).'%');
                        }
                    }
                }
            });
        }

        if(!empty($this->sortfield)){
            foreach($this->sortfield as $sortField => $sortDirection ){
                if (($column = $this->getColumnByAttribute($sortField)) !== false && is_callable($column->getSortCallback())) {
                    // error_log('jalan di mari1');
                    $builder = app()->call($column->getSortCallback(), ['builder' => $builder, 'direction' => $sortDirection]);
                }else{
                    // error_log('jalan di mari2');
                    $builder->orderBy($this->sortHasRelation($builder, $sortField), $sortDirection);
                }
            }
        }
        else{
            $builder->orderBy($this->initialColumnSort, $this->initialSort);
        }
        
        // error_log($builder->toSql());
        return $builder;
    }
}

