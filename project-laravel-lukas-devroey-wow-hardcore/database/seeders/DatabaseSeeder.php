<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin aanmaken (alleen als deze nog niet bestaat)
        User::firstOrCreate(
            ['email' => 'admin@ehb.be'], // Check op dit veld
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // 2. Dummy users
        User::factory(10)->create();

        // 3. FAQ Data
        $cat = FaqCategory::create(['name' => 'Algemeen']);
        FaqItem::create([
            'faq_category_id' => $cat->id,
            'question' => 'Hoe log ik in?',
            'answer' => 'Via de knop rechtsboven.'
        ]);

        // 4. Nieuws Data
        NewsItem::factory(5)->create();
    }
}
