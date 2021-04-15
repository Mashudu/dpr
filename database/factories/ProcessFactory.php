<?php

namespace Database\Factories;

use App\Models\Process;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Process::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = Status::find(1);
        return [
            //
            'name' => $this->faker->company,
            'description' =>$this ->faker->company,
            'problem' =>$this ->faker->company,
            'solution' =>$this ->faker->company,
            'benefit_description' =>$this ->faker->company,
            'user_id' =>2,
            'status' =>$status->name,
            'functional_area_id'=>5,
        ];
    }
}
