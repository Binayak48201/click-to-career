<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum>
 */
class ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence();
        return [
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'title' => $title,
            'body' => fake()->paragraph(),
            'slug' => Str::slug($title)
        ];
    }
}
//php artisan migrate:fresh
//php artisan tinker
// Forum::factory(10)->create();
