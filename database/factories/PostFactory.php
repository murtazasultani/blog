<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => Str::slug($this->faker->sentence, '-'),
            'title' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'content' => $this->faker->sentence($nbWords = 200, $variableNbWords = true),
            'published' => $this->faker->boolean,
            'publish_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'user_id' => User::count() ? User::all()->random()->id : null
        ];
    }
}
