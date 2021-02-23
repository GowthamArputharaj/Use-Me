<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::get()->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($userIds),
            'title' => $this->faker->text(rand(7, 15)),
            'content' => $this->faker->text(rand(50, 100)),
            'published' => $this->faker->randomElement([true, false])
        ];
    }
}
