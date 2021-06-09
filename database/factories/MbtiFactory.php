<?php

namespace Database\Factories;

use App\Models\Mbti;
use Illuminate\Database\Eloquent\Factories\Factory;

class MbtiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mbti::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '2',
            'board_name' => 'infp',
            'title' => $this->faker->word(),
            'story' => $this->faker->sentence(),
        ];
    }
}
