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
            'mbtiSort' => 'istp',
            'user_id' => '1',
            'user_name' =>'홍길동',
            'title' => $this->faker->word,
            'story' => $this->faker->paragraph,
            'created_at' => '2021-04-13 16:45:00',
            'updated_at' => '2021-04-13 16:45:00',
        ];
    }
}
