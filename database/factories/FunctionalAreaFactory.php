<?php

namespace Database\Factories;

use App\Models\FunctionalArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class FunctionalAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FunctionalArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->company,  
            'description' => $this->faker->company, 
            'business_unit_id' => 5,  
               
        ];
    }
}
