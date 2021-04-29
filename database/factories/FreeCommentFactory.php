<?php

namespace Database\Factories;

use App\Models\FreeComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreeCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FreeComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'free_id' => 40,
            'comment_id' => 1,
            'class' => 1,
            'story' => $this->faker->sentence()
        ];
    }
}
