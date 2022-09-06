<?php

namespace Database\Seeders;

use App\Models\delivery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryRecord = [
            'user_id'=>7,
            'address'=>'Afghanistan',
            'city'=>'Bamyan',
            'state'=>'Bamyan',
            'pincode'=>'20001',
            'phone'=>'930000300',
            'status'=>1,
        ];
        delivery::create($deliveryRecord);
    }
}
