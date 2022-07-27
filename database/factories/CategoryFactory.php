<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker()->name(),
            'discount'=>ceil(rand(0,10)),
            'parent_id'=>ceil(ran(0,1000)),
            'image'=>'image/'.Str::random(4).'.jpg',
            'description'=>faker()->info(),
            'url'=>'image/'.Str::random(4).'.html',
            'meta_title'=>faker()->title(),
            'meta_description'=>faker()->name(),
            'meta_keywords'=>Str::random(14),
            'meta_keywords'=>floor(rand(0,1)),
        ];
    }
}
