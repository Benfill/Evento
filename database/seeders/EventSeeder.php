<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();
        $locations  = Location::all();

        // Safety checks
        if (! $user || $categories->isEmpty() || $locations->isEmpty()) {
            $this->command->warn('Events not seeded: missing users, categories, or locations.');
            return;
        }

        foreach (range(1, 10) as $i) {
            $title = "Event {$i}";

            Event::create([
                'title'             => $title,
                'slug'              => Str::slug($title),
                'description'       => "Description for {$title}",
                'picture'           => 'pictures/events/default.jpg',
                'date'              => now()->addDays(rand(1, 60))->format('Y-m-d'),
                'status'            => 'published',
                'places'            => rand(20, 200),
                'reservationCount'  => 0,
                'price'             => rand(50, 500),
                'validation'        => 'auto',
                'user_id'           => $user->id,
                'category_id'       => $categories->random()->id,
                'location_id'       => $locations->random()->id,
            ]);
        }
    }
}
