<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeTableSeeder extends Seeder
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
                'id' => 1,
                'reg_id' => 'IP06001',
                'name' => 'Agus',
                'address' => 'Jln Gaja Mada no 12, Surabaya',
                'birth_date' => '1980-01-11',
                'join_date' => '2005-08-07',
            ],
            [
                'id' => 2,
                'reg_id' => 'IP06002',
                'name' => 'Amin',
                'address' => 'Jln Imam Bonjol no 11, Mojokerto',
                'birth_date' => '1977-09-03',
                'join_date' => '2005-08-07',
            ],
            [
                'id' => 3,
                'reg_id' => 'IP06003',
                'name' => 'Yusuf',
                'address' => 'Jln A Yani Raya 15 No 14 Malang',
                'birth_date' => '1973-08-09',
                'join_date' => '2006-08-07',
            ],
            [
                'id' => 4,
                'reg_id' => 'IP06004',
                'name' => 'Alyssa',
                'address' => 'Jln Bungur Sari V no 166, Bandung',
                'birth_date' => '1983-03-18',
                'join_date' => '2006-09-06',
            ],
            [
                'id' => 5,
                'reg_id' => 'IP06005',
                'name' => 'Maulana',
                'address' => 'Jln Candi Agung, No 78 Gg 5, Jakarta',
                'birth_date' => '1978-11-10',
                'join_date' => '2006-09-10',
            ],
            [
                'id' => 6,
                'reg_id' => 'IP06006',
                'name' => 'Agfika',
                'address' => 'Jln Nangka, Jakarta Timur',
                'birth_date' => '1979-02-07',
                'join_date' => '2007-01-02',
            ],
            [
                'id' => 7,
                'reg_id' => 'IP06007',
                'name' => 'James',
                'address' => 'Jln Merpati, 8 Surabaya',
                'birth_date' => '1989-05-18',
                'join_date' => '2007-04-04',
            ],
            [
                'id' => 8,
                'reg_id' => 'IP06008',
                'name' => 'Octavanus',
                'address' => 'Jln A Yani 17, B 08 Sidoarjo',
                'birth_date' => '1985-04-14',
                'join_date' => '2007-05-07',
            ],
            [
                'id' => 9,
                'reg_id' => 'IP06009',
                'name' => 'Nugroho',
                'address' => 'Jln Duren tiga 167, Jakarta Selatan',
                'birth_date' => '1984-01-01',
                'join_date' => '2008-01-16',
            ],
            [
                'id' => 10,
                'reg_id' => 'IP06010',
                'name' => 'Raisa',
                'address' => 'Jln Kelapa Sawit, Jakarta Selatan',
                'birth_date' => '1990-12-17',
                'join_date' => '2008-08-16',
            ]
        ];

        foreach($list as $data)
        {
            Employee::create($data);
        }
    }
}
