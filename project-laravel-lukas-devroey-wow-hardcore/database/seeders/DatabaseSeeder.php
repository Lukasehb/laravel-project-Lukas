<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Tag;

// ...
$tags = [
    Tag::create(['name' => 'PvP']),
    Tag::create(['name' => 'Raiding']),
    Tag::create(['name' => 'Dungeons']),
    Tag::create(['name' => 'Leveling']),
];

NewsItem::all()->each(function ($news) use ($tags) {
    // Koppel willekeurige tags aan nieuws (Many-to-Many in actie)
    $news->tags()->attach(
        collect($tags)->random(rand(1, 2))->pluck('id')
    );
});

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


        User::factory(10)->create();

        // 3. FAQ Data
        $cat = FaqCategory::create(['name' => 'Algemeen']);
        FaqItem::create([
            'faq_category_id' => $cat->id,
            'question' => 'Hoe log ik in?',
            'answer' => 'Via de knop rechtsboven.'
        ]);


        NewsItem::factory(5)->create();
    }
}
