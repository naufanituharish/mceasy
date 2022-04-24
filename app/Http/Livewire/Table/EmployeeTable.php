<?php

namespace App\Http\Livewire\Table;

use App\Models\Employee;
use App\View\Column;
use App\View\Filter;
use App\View\ComponentMenu;
use App\Traits\FormatedComponents;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class EmployeeTable extends TableBase
{
    use FormatedComponents;

    public $firstJoin = false;
        
    public function mount(){
        if ($this->firstJoin) {
            $this->initialColumnSort="join_date";
            $this->initialSort="asc";
            $this->searchEnabled=false;
            $this->displayLink=false;
            $this->displayPerpage=false;
            $this->displayCount=false;
        }
    }

    public function query():Builder
    {
        return Employee::query();
    }

    public function columns():array
    {
        return [
            Column::make('Nomor Induk', 'reg_id')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Alamat', 'address'),
            Column::make('Tanggal Lahir', 'birth_date')
                ->format(function($model){
                    return Carbon::parse($model->birth_date)->format('d-m-Y');
                })
                ->sortable(),
            Column::make('Tanggal Bergabung', 'join_date')
                ->format(function($model){
                    return Carbon::parse($model->join_date)->format('d-m-Y');
                })
                ->sortable(),
            Column::make('Menu')
                ->hideIf($this->firstJoin)
                ->format(function(Employee $model){
                    return $this->componentMenu('',[
                        ComponentMenu::make('Ubah data karyawan')
                            ->attributes([
                                'href'       => "javascript:;",
                                'wire:click' => '$emitTo("modal-form", "showModalForm","employee-form",null,"Update",'.$model->id.')'
                            ]),
                        ComponentMenu::make('Hapus data karyawan')
                            ->attributes([
                                'href'       => "javascript:;",
                                'wire:click' => '$emitTo("modal-form", "showModalForm","employee-form",null,"Delete",'.$model->id.')'
                            ]),
                        ComponentMenu::make('Sparator','sparator'),
                        ComponentMenu::make('Tambah Cuti')
                            ->attributes([
                                'href'       => "javascript:;",
                                'wire:click' => '$emitTo("modal-form", "showModalForm","employee-form",null,"Permit",'.$model->id.')'
                            ]),

                    ]);
                }),
        ];
    }
}
