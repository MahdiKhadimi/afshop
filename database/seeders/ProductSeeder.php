<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\product;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [ 
            'section_id'=>1,
            'category_id'=>1,
            'name'=>Str::random(10),
            'fabric'=>Str::random(10),
            'description'=>Str::random(),
            'meta_title'=>Str::random(5),
            'meta_keywords'=>Str::random(5),
            'weight'=>Str::random(5),
            'price'=>ceil(rand(100,1000)),
            'discount'=>ceil(rand(0,10)),
            'video'=>Str::random(),
            'model'=>Str::random(),
            'code'=>Str::random(),
            'color'=>Str::random(),
            'patter'=>Str::random(),
            'sleeve'=>Str::random(),
            'meta_description'=>Str::random(),
            'status'=>ceil(rand(0,1)),
            'is_featured'=>'yes',
        ];
        Product::create($data);
    }
}
