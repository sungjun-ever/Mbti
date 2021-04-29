<?php

namespace Database\Factories;

use App\Models\MbtiComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MbtiComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'mbti_id' => 680,
            'comment_id'=> 3,
            'class' => 1,
            'story' => $this->faker->sentence(),
        ];
    }
}
