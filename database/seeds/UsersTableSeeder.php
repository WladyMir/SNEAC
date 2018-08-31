<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Wladimir Cerda',
            'email' => 'wlady.ohi@gmail.com',
            'password' => bcrypt('qwerty12'),
            'is_admin' => true,
            'is_quality_attendant' => false,
            'rut' => '18.645.450-2',
        ]);
        User::create([
            'name' => 'Juan Perez',
            'email' => 'wladimir.cerda@usach.cl',
            'password' => bcrypt('qwerty12'),
            'is_admin' => false,
            'is_quality_attendant' => true,
            'rut' => '11.111.111-1',
        ]);
        User::create([
            'name' => 'Camila Muñoz',
            'email' => 'wlady-ohi@live.cl',
            'password' => bcrypt('qwerty12'),
            'is_admin' => false,
            'is_quality_attendant' => true,
            'rut' => '10.416.016-6',
        ]);
    }
}
