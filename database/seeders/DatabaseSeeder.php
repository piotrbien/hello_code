<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRole;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Example Admin',
             'email' => 'admin@example.com',
             'role' => UserRole::ADMIN,
         ]);

         User::factory()->count(50)->create();

         Article::factory()->count(25)->create();
         Comment::factory()->count(100)->create();
    }
}
