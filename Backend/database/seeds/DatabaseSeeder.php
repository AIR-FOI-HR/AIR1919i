<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MealsTableSeeder::class,
            WeeklyMenuTableSeeder::class,
            WeeklyMenuTableSeeder::class,
            UsersTableSeeder::class,
            UserFavoriteMealsTableSeeder::class,
            ReviewsTableSeeder::class,
            QrCodesTableSeeder::class
        ]);
    }
}