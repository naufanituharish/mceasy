<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeePermit;

class EmployeePermitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'employee_id' => 1,
                'permit_date' => '2020-08-02',
                'permit_duration' => 2,
                'notes' => 'Acara Keluarga',
            ],
            [
                'employee_id' => 1,
                'permit_date' => '2020-08-18',
                'permit_duration' => 2,
                'notes' => 'Anak Sakit',
            ],
            [
                'employee_id' => 6,
                'permit_date' => '2020-08-19',
                'permit_duration' => 1,
                'notes' => 'Nenek Sakit',
            ],
            [
                'employee_id' => 7,
                'permit_date' => '2020-08-23',
                'permit_duration' => 1,
                'notes' => 'Sakit',
            ],
            [
                'employee_id' => 4,
                'permit_date' => '2020-08-29',
                'permit_duration' => 5,
                'notes' => 'Menikah',
            ],
            [
                'employee_id' => 3,
                'permit_date' => '2020-08-30',
                'permit_duration' => 2,
                'notes' => 'Acara Keluarga',
            ],
        ];

        foreach($list as $data)
        {
            EmployeePermit::create($data);
        }
    }
}
