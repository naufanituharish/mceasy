<?php

namespace App\Http\Livewire\Form\Concern\Fields;
use App\View\FormFields;
use Illuminate\Validation\Rule;

/**
 * Trait EmployeeFields.
 */
trait EmployeeFields
{
    public function fields():array
    {
        return [
            FormFields::make('Create/Update Form Group')
                ->arrayOfFields([
                    FormFields::make('Nomor Induk', 'model.reg_id')
                        ->input('text')
                        ->placeholder(__('Silahkan masukkan nomor induk karyawan'))
                        ->fieldRules('required|max:255|string|unique:employees,reg_id')
                        ->errorMessage([
                            'required' => 'Kolom nomor induk karyawan dibutuhkan!',
                            'string'  => 'Kolom nomor induk karyawan hanya dapat di isi angka dan huruf!',
                            'max'     => 'Kolom nomor induk karyawan hanya dapat terdiri dari 255 karakter atau kurang!'
                        ]),
                    FormFields::make('Nama', 'model.name')
                        ->input('text')
                        ->placeholder(__('Silahkan masukkan nama karyawan'))
                        ->fieldRules('required|max:255|string')
                        ->errorMessage([
                            'required' => 'Kolom nama dibutuhkan!',
                            'string'  => 'Kolom nama hanya dapat di isi angka dan huruf!',
                            'max'     => 'Kolom nama hanya dapat terdiri dari 255 karakter atau kurang!'
                        ]),
                    FormFields::make('Alamat', 'model.address')
                        ->textarea(4)
                        ->placeholder(__('Alamat'))
                        ->fieldRules('required|string')
                        ->errorMessage([
                            'required' => 'Kolom Alamat dibutuhkan!',
                            'string'  => 'Kolom Alamat hanya dapat berisi string!',
                        ]),
                        
                    FormFields::make('Tanggal Lahir', 'model.birth_date')
                        ->datepicker([
                            'data-date-autoclose' => 'true',
                            'data-date-format' => 'dd-mm-yyyy',
                            'data-date-today-highlight'=> 'true',
                        ])
                        ->placeholder(__('Silahkan masukkan tanggal lahir karyawan'))
                        ->fieldRules('required|date')
                        ->errorMessage([
                            'required' => 'Kolom tanggal lahir karyawan dibutuhkan!',
                            'date'  => 'Format tanggal tidak valid!',
                        ]),
                    FormFields::make('Tanggal Bergabung', 'model.join_date')
                        ->datepicker([
                            'data-date-autoclose' => 'true',
                            'data-date-format' => 'dd-mm-yyyy',
                            'data-date-today-highlight'=> 'true',
                        ])
                        ->placeholder(__('Silahkan masukkan tanggal bergabung karyawan'))
                        ->fieldRules('required|date')
                        ->errorMessage([
                            'required' => 'Kolom tanggal bergabung karyawan dibutuhkan!',
                            'date'  => 'Format tanggal tidak valid!',
                        ]),                  
                ])
                ->hideIf( $this->formType === 'Create' || $this->formType === 'Update'  ? false : true )
                ->noBorder()
                ->withoutLabel(),
            FormFields::make('Permit Form Group')
                ->arrayOfFields([
                    FormFields::make('Tanggal Mulai Cuti', 'permitDate')
                        ->datepicker([
                            'data-date-autoclose' => 'true',
                            'data-date-format' => 'dd-mm-yyyy',
                            'data-date-today-highlight'=> 'true',
                        ])
                        ->placeholder(__('Silahkan masukkan tanggal mulai cuti'))
                        ->fieldRules('required|date')
                        ->errorMessage([
                            'required' => 'Kolom tanggal mulai cuti dibutuhkan!',
                            'date'  => 'Format tanggal tidak valid!',
                        ]),
                    FormFields::make('Lama Cuti ', 'permitDuration')
                        ->input('number')
                        ->placeholder(__('Silahkan masukkan durasi cuti'))
                        ->fieldRules('required|integer')
                        ->errorMessage([
                            'required' => 'Kolom durasi cuti dibutuhkan!',
                            'integer'  => 'Kolom durasi cuti hanya dapat di isi angka!'
                        ]),
                    FormFields::make('Keterangan', 'permitNote')
                        ->textarea(4)
                        ->placeholder(__('Keterangan'))
                        ->fieldRules('required|string')
                        ->errorMessage([
                            'required' => 'Kolom Keterangan dibutuhkan!',
                            'string'  => 'Kolom Keterangan hanya dapat berisi string!',
                        ]),                 
                ])
                ->hideIf( $this->formType === 'Permit' ? false : true )
                ->noBorder()
                ->withoutLabel(),
            FormFields::make('Delete Form Group')
                ->arrayOfFields([
                    FormFields::make('Delete Confirmation Text')
                        ->format(function(){
                            return $this->componentArray([
                                $this->componentElement('elements.delete-text',[
                                    'field' => 'Data Karyawan '.$this->model->employee_id
                                ]),
                            ],
                            $this->componentElement('elements.alert',[
                                'title' => 'Peringatan!', 
                                'icon' => 'fa fa-info-circle', 
                                'type' => 'danger'
                            ]));
                        }),
                    FormFields::make('Konfirmasi Penghapusan', 'deleteconfirmation')
                        ->checkbox()
                        ->fieldRules('accepted')
                        ->errorMessage([
                            'accepted' => 'Kolom konfirmasi dibutuhkan!',
                        ])
                        
                ])
                ->hideIf( $this->formType === 'Delete' ? false : true )
                ->noBorder()
                ->withoutLabel(),            
        ];
    }
}