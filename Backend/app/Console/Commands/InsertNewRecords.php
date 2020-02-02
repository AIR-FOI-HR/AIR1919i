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

//        $qr_code = new QrCode();
//        $qr_code->code = '0XaYtF2IWz8mcFo31SmonV1W5NvlIP6Z';
//        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOcAAADnAQMAAADfOtNjAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAUhJREFUWIXtmDGSgzAMReWhoOQIPgpHw0fjKDkCZQqPtV+yncBstto0n7EaHL80H0nfMiIjRoz4Rixq8VweawpZ8PDfD2Zqi+n5eqypb/LSVQu2IVImCF2Tq78BtQyqHnIbKtiG3ntQ8WJUTepdluRDxVLRt2/URP7lKjS0R9RamvIxmOiiu0AvalKLp24Ll7fBRyXumx1T1QmPuEu5vAZCCqGh6jUnrImkptZXIc+Qa11mpemGSEwtg37w2np2b8/X/NJRpE4ztsX/hJ4r09kJ+WjzDU+k2zoyeKpJSopiROqaYUTXezBTC/gGZG+a36cxOW2y/fYkUiuUlzaF3mza7hrKTaHQ59h9qxPFtWIp6ev2VAf0NirRU6zQZbNn8XRaMdNoGXQazl1GSaV/Vyn9hvu7Yqlod3P79jXbHOv2QUxHjBjxv/gBIagDHqXVCVEAAAAASUVORK5CYII=';
//        $qr_code->max_scan_times = 10;
//        $qr_code->save();
//
//        $qr_code = new QrCode();
//        $qr_code->code = '6zu958HB8wM39fpqcNchkhaFUSmlE4SI';
//        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOcAAADnAQMAAADfOtNjAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAATFJREFUWIXtlzESwjAMBC+TgpIn8JQ8LXlansITKFNkLHSSgTCECprLWE1srRtNzicLaNGixT/ibIzFV2N8hthflSkX/YKLWek9PUyPpC4dPL2cmU7qZR+Bsl6nNxyHMo5CEZr0WwacvilWiqZvUJMpzT1XkaJvh/wP7oYU9fSUFY62wi/bhKpQXTqP3XpioSXu3IQ3TQpSV2Fn1duXV/XiNH6dGcse+BGnboFh6paajLNQpjbD01RhqQrdditBigv30XiZ9rPd1tsFafSnVGEWSheRpnRzPslZ6JpNS52+yi6IdNl4uyLdvJH2Zg1FykUfYqz2YdmNhWnOg954n5r8nHAFKR7dKnzRDkCjW3HQnce6E6YITbINR7fiWPihWClafcNpvigQ9iFMW7Ro8VvcAd6O/CvdyOt6AAAAAElFTkSuQmCC';
//        $qr_code->max_scan_times = 10;
//        $qr_code->save();

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
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 8;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 7;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 6;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 5;
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
//        $weekly_menu->meal_id = 22;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 23;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 24;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 25;
//        $weekly_menu->save();
//
//        // Sunday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 1;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 2;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 3;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 4;
//        $weekly_menu->save();
    }
}
