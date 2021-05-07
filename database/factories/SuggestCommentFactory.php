<?php

namespace Database\Factories;

use App\Models\SuggestComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuggestCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuggestComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'board_id' => 20,
            'story' => $this->faker->realText(),
        ];
    }
}
