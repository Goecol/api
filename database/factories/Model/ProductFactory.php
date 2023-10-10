<?php

namespace Database\Factories\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use APP\Models\Model\Product;
use APP\Models\User;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word,
            'detail'=>$this->faker->paragraph,
            'price'=>$this->faker->numberBetween(100,1000),
            'stock'=>$this->faker->randomDigit,
            'discount'=>$this->faker->numberBetween(2,30),
            'user_id'=>function(){
                return User::all()->random();
            },
        ];
    }
}
