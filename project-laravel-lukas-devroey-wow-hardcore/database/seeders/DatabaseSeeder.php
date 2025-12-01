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
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::create([
             'name' => 'Admin User',
             'username' => 'admin',
             'email' => 'admin@ehb.be',
             'password' => Hash::make('Password!321'),
             'is_admin' => true,
             'email_verified_at' => now(),]);


        User::factory(10)->create();

        $cat = FaqCategory::create(['name' => 'Algemeen']);
        FaqItem::create([
            'faq_category_id' => $cat->id,
            'question' => 'Hoe log ik in?',
            'answer' => 'Via de knop rechtsboven.'
        ]);

        NewsItem::factory(5)->create();
    }
}
