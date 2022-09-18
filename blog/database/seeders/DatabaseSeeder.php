<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Tag::factory()->count(50)->create();
        Category::factory()->count(50)->create();
        Post::factory()->count(50)->create();


        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'shariar',
            'password' => Hash::make(12345678),
            'email' => 'shariar@example.com',
        ]);
    }
}
