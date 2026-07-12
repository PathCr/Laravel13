<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $sites = Site::factory()->count(3)->for($user)->create();

        foreach ($sites as $site)
        {
            $reviews = Review::factory()->count(5)->for($site)->create();
        }
    }
}
