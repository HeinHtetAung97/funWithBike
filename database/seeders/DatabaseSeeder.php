<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Article::factory()->count(10)->create();

        $list = ['Cafe', 'Tracker', 'Scrambler', 'Bobber', 'Brat'];
        foreach ($list as $type) {
            Category::create(["name" => $type]);
        }

        Comment::factory()->count(30)->create();


        User::factory()->create([
            'name' => 'Hein',
            'email' => 'hein@gmail.com'
        ]);

        User::factory()->create([
            'name' => 'Honey',
            'email' => 'honey@gmail.com'
        ]);
    }
}
