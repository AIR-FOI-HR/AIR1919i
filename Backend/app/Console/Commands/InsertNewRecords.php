<?php

namespace App\Console\Commands;

use App\Meal;
use App\User;
use App\WeeklyMenu;
use Illuminate\Console\Command;

class InsertNewRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'records:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts new records in the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // Populate meals table

//        Meal::create(['name' => 'Monday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Monday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Monday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Monday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);
//
//        Meal::create(['name' => 'Tuesday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Tuesday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Tuesday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Tuesday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);
//
//        Meal::create(['name' => 'Wednesday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Wednesday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Wednesday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Wednesday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);
//
//        Meal::create(['name' => 'Thursday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Thursday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Thursday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Thursday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);
//
//        Meal::create(['name' => 'Friday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Friday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Friday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Friday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);
//
//        Meal::create(['name' => 'Saturday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Saturday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Saturday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Saturday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);
//
//        Meal::create(['name' => 'Sunday First Meal', 'price' => 25.0, 'description' => 'Very expensive.']);
//        Meal::create(['name' => 'Sunday Second Meal', 'price' => 75.0, 'description' => 'Such tasty.']);
//        Meal::create(['name' => 'Sunday Third Meal', 'price' => 45.0, 'description' => 'Much good.']);
//        Meal::create(['name' => 'Sunday Fourth Meal', 'price' => 15.0, 'description' => 'Really best.']);

        // Populate weekly_menu table

//        for ($i = 0; $i < 7; $i++) {
//            for ($j = 8; $j < 12; $j++) {
//                $weekly_menu = new WeeklyMenu();
//                $weekly_menu->day = $i;
//                $weekly_menu->meal_id = $j;
//                $weekly_menu->save();
//            }
//        }

        // Populate qr_codes table

        // Populate ratings table

//        User::find(1)->ratings()->save(Meal::first(), ['stars' => 5, 'comment' => 'Very good food indeed.']);

        // Populate user_favorite_meals table

//        User::find(1)->favoriteMeals()->save(Meal::find(20));

        // Populate qr_code_user table

        // Monday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 20;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 19;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 46;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 47;
//        $weekly_menu->save();
//
//        // Tuesday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 48;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 49;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 50;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 51;
//        $weekly_menu->save();
//
//        // Wednesday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 52;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 53;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 54;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 55;
//        $weekly_menu->save();
//
//        // Thursday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 56;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 57;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 58;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 59;
//        $weekly_menu->save();
//
//        // Friday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 60;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 61;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 62;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 63;
//        $weekly_menu->save();
//
//        // Saturday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 64;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 65;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 66;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 67;
//        $weekly_menu->save();
//
//        // Sunday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 68;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 69;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 70;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 71;
//        $weekly_menu->save();
    }
}
