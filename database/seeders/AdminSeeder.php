<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\models\admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            'name'=>'ali',
            'email'=>'admin@gmail.com',
            'type'=>1,
            'password'=>Hash::make(123),
            'phone'=>'077997987',
            'photo'=>'',
            'status'=>1
        ];


        admin::create($adminRecords);

    }
}
