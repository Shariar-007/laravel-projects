<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id = rand(30, 300);
        $image = "https://i.picsum.photos/id/".$id."/640/480.jpg";
        return [
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'image' => $image,
            'description' => fake()->text(400),
            'category_id' => function(){
                return Category::inRandomOrder()->first()->id;
            },
            'user_id' => 1,
        ];
    }
}
