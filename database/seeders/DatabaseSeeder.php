<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Post::factory(10)->create([
            'user_id' => 1,
            'title' => $faker->sentence(),
            'body' => $faker->paragraph(20),
        ]);
    }
}
