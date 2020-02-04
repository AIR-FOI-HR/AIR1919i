<?php

use App\WeeklyMenu;
use Illuminate\Database\Seeder;

class WeeklyMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Monday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 1;
        $weekly_menu->meal_id = 1;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 1;
        $weekly_menu->meal_id = 2;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 1;
        $weekly_menu->meal_id = 3;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 1;
        $weekly_menu->meal_id = 4;
        $weekly_menu->save();

        // Tuesday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 2;
        $weekly_menu->meal_id = 5;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 2;
        $weekly_menu->meal_id = 6;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 2;
        $weekly_menu->meal_id = 7;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 2;
        $weekly_menu->meal_id = 8;
        $weekly_menu->save();

        // Wednesday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 3;
        $weekly_menu->meal_id = 9;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 3;
        $weekly_menu->meal_id = 10;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 3;
        $weekly_menu->meal_id = 11;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 3;
        $weekly_menu->meal_id = 12;
        $weekly_menu->save();

        // Thursday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 4;
        $weekly_menu->meal_id = 13;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 4;
        $weekly_menu->meal_id = 14;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 4;
        $weekly_menu->meal_id = 15;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 4;
        $weekly_menu->meal_id = 16;
        $weekly_menu->save();

        // Friday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 5;
        $weekly_menu->meal_id = 17;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 5;
        $weekly_menu->meal_id = 18;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 5;
        $weekly_menu->meal_id = 19;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 5;
        $weekly_menu->meal_id = 20;
        $weekly_menu->save();

        // Saturday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 6;
        $weekly_menu->meal_id = 21;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 6;
        $weekly_menu->meal_id = 22;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 6;
        $weekly_menu->meal_id = 23;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 6;
        $weekly_menu->meal_id = 24;
        $weekly_menu->save();

        // Sunday
        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 7;
        $weekly_menu->meal_id = 25;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 7;
        $weekly_menu->meal_id = 26;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 7;
        $weekly_menu->meal_id = 27;
        $weekly_menu->save();

        $weekly_menu = new WeeklyMenu();
        $weekly_menu->day = 7;
        $weekly_menu->meal_id = 28;
        $weekly_menu->save();
    }
}