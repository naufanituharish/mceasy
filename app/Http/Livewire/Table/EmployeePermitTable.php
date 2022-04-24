<?php

namespace App\Http\Livewire\Table;

use App\Models\Employee;
use App\Models\EmployeePermit;
use App\View\Column;
use App\View\Filter;
use App\View\ComponentMenu;
use App\Traits\FormatedComponents;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class EmployeePermitTable extends TableBase
{
    use FormatedComponents;

    public $moreThanOne = false;
    public $perPage = 3;
        
    public function getQueryString()
    {
        return [];
    }
    
    public function query():Builder
    {
        if ($this->moreThanOne) {
            return Employee::has('permit', '>', 1);
        }
        return EmployeePermit::with('employee');
    }

    public function columns():array
    {
        if ($this->moreThanOne) {
            return [
                Column::make('Nomor Induk', 'reg_id')
                    ->sortable()
                    ->searchable(),
                Column::make('Nama', 'name')
                    ->sortable()
                    ->searchable(),
            ];
        }
        return [
            Column::make('Nomor Induk', 'employee.reg_id')
                ->sortable()
                ->searchable(),
            Column::make('Tanggal Cuti', 'permit_date')
                ->format(function($model){
                    return Carbon::parse($model->permit_date)->format('d-m-Y');
                })
                ->sortable(),
            Column::make('Lama Cuti', 'permit_duration')
                ->sortable(),
            Column::make('Keterangan', 'notes')
                ->sortable(),
        ];
    }
}
