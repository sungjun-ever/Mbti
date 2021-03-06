<?php

namespace Database\Factories;

use App\Models\Suggest;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuggestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suggest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'story' => $this->faker->realText(),
            'user_id' => 1,
            'board_name' => 'suggests'
        ];
    }
}
