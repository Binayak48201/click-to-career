<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'forum_id' => function () {
                return Forum::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'body' => fake()->paragraph(),
        ];
    }
}

// Tinker bata chalauno ko lagi.
// $forum = Forum::all();

//foreach($forum as $data){
//    Reply::factory(10)->create(['forum_id' => $data->id]);
//}
//$forum->each(function ($data) {
//    Reply::factory(10)->create(['forum_id' => $data->id]);
//});


