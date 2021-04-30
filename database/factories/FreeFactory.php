<?php

namespace Database\Factories;

use App\Models\Free;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Free::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'title' => $this->faker->word(),
            'story' => $this->faker->sentence(),
        ];
    }
}
