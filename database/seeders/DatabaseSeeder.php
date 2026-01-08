<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesPermissionsSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            LocationSeeder::class,
            EventSeeder::class,
        ]);
    }
}
