<?php

namespace App\Http\Livewire\Form;

use App\Models\Employee;
use App\Models\EmployeePermit;
use App\Traits\FormatedComponents;
use App\Http\Livewire\Form\Concern\Fields\EmployeeFields;
use Carbon\Carbon;

class EmployeeForm extends FormBase
{
    use FormatedComponents, 
        EmployeeFields;

    public Employee $model;
    public $modelId = null;
    public $formType = '';
    public $permitDate = '';
    public $permitDuration = '';
    public $permitNote = '';
    public $deleteconfirmation;

    public function submit(){
        $this->validate();
        switch ($this->formType) {
            case "Create":
                $this->model->birth_date = Carbon::createFromFormat('d-m-Y', $this->model->birth_date);
                $this->model->join_date = Carbon::createFromFormat('d-m-Y', $this->model->join_date);
                $this->model->save();
                break;
            case "Update":
                $this->model->birth_date = Carbon::createFromFormat('d-m-Y', $this->model->birth_date);
                $this->model->join_date = Carbon::createFromFormat('d-m-Y', $this->model->join_date);
                $this->model->save();
                break;
            case "Permit":
                $this->model->permit()->create([
                    'permit_date' => Carbon::createFromFormat('d-m-Y', $this->permitDate),
                    'permit_duration' => $this->permitDuration,
                    'notes' => $this->permitNote,
                ]);
                break;
            case "Delete":
                $this->model->delete();
                break;
            default:
        }
        $this->emitUp('hideModalForm');
        $this->emitTo('table.employee-table', 'refreshTable');
    }

    public function mount($formType, $modelId = null, Employee $model) {
        $this->formType = $formType;
        $this->modelId = $modelId;
        if($modelId){
            $this->model = $model->find($modelId);
            $this->model->birth_date = Carbon::parse($this->model->birth_date)->format('d-m-Y');
            $this->model->join_date = Carbon::parse($this->model->join_date)->format('d-m-Y');
        }else{
            $this->model = $model;
        }
    }
}
