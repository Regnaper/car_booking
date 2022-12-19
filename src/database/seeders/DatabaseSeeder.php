<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_comfort_categories')->truncate();

        $this->call([
            ComfortCategoriesSeeder::class,
            PostsSeeder::class,
            UsersSeeder::class,
            CarModelsSeeder::class,
            CarsSeeder::class,
            BookingsSeeder::class,
        ]);

    }
}
