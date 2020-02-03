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

//        Meal::create(['name' => 'Salmon', 'price' => 70, 'description' => 'fried potatoes, garlic sauce, calamari squid', 'img' => 'img/menu/salmon.jpg']);
//        Meal::create(['name' => 'Kobe Beef', 'price' => 115, 'description' => 'onion, grilled tomatoes, potatoes side dish', 'img' => 'img/menu/kobe_beef.jpeg']);
//        Meal::create(['name' => 'Minced Meat', 'price' => 35, 'description' => 'olives, home baked bread, mushrooms', 'img' => 'img/menu/minced_meat.jpg']);
//        Meal::create(['name' => 'Sausages', 'price' => 40, 'description' => 'original slavonian homemade sausages', 'img' => 'img/menu/sausages.jpg']);
//
//        Meal::create(['name' => 'Eggs', 'price' => 30, 'description' => 'florentine two poached eggs, spinach', 'img' => 'img/menu/eggs.jpg']);
//        Meal::create(['name' => 'Chicken', 'price' => 60, 'description' => 'wrapped in ham & sage', 'img' => 'img/menu/chicken.jpg']);
//        Meal::create(['name' => 'Royal Fillet', 'price' => 55, 'description' => 'formans smoked salmon', 'img' => 'img/menu/royal_fillet.jpeg']);
//        Meal::create(['name' => 'Pudding Podium', 'price' => 18, 'description' => 'salted caramel chocolate pots', 'img' => 'img/menu/pudding_podium.jpg']);
//
//        Meal::create(['name' => 'Grilled Meat', 'price' => 42, 'description' => 'grilled vegetables, bread', 'img' => 'img/menu/grilled_meat.jpg']);
//        Meal::create(['name' => 'Pizza', 'price' => 52, 'description' => 'ham, cheese, mushrooms, olives', 'img' => 'img/menu/pizza.jpeg']);
//        Meal::create(['name' => 'Scotch Lobster', 'price' => 110, 'description' => 'salad, nicoise style, vegetables', 'img' => 'img/menu/scotch_lobster.jpg']);
//        Meal::create(['name' => 'Crostata Al Limone', 'price' => 75, 'description' => 'lemon tart, sweet pastry', 'img' => 'img/menu/crostata_al_limone.jpeg']);
//
//        Meal::create(['name' => 'Macaroni', 'price' => 35, 'description' => 'cheese, parmesan, side dish', 'img' => 'img/menu/macaroni.jpg']);
//        Meal::create(['name' => 'Plum Tart', 'price' => 40, 'description' => 'pastry tart with plums', 'img' => 'img/menu/plum_tart.jpeg']);
//        Meal::create(['name' => 'Panna Cotta', 'price' => 45, 'description' => 'vanilla, rum flavoured cream', 'img' => 'img/menu/pana_cotta.jpg']);
//        Meal::create(['name' => 'French Toast', 'price' => 60, 'description' => 'fruit salad, maple flavoured syrup', 'img' => 'img/menu/french_toast.jpg']);
//
//        Meal::create(['name' => 'French Breakfast', 'price' => 25, 'description' => 'scrambled eggs, bacon, mushrooms', 'img' => 'img/menu/french_breakfast,jpg']);
//        Meal::create(['name' => 'Corn Soup', 'price' => 35, 'description' => 'dungeness crab gratin, chipotle gelee', 'img' => 'img/menu/corn_soup.jpg']);
//        Meal::create(['name' => 'Lobster Rolls', 'price' => 90, 'description' => 'house made old bay potato chips', 'img' => 'img/menu/lobster_rolls.jpg']);
//        Meal::create(['name' => 'Prime Rib', 'price' => 60, 'description' => 'garlic, mustard rub, horseradish', 'img' => 'img/menu/prime_rib.jpeg']);
//
//        Meal::create(['name' => 'Seafood Stew', 'price' => 40, 'description' => 'prawns, mussels, calamari, market catch', 'img' => 'img/menu/seafood_stew.jpeg']);
//        Meal::create(['name' => 'Scallops', 'price' => 75, 'description' => 'fennel, prosciutto, black bean sauce', 'img' => 'img/menu/scallops.jpeg']);
//        Meal::create(['name' => 'Tako Salad', 'price' => 45, 'description' => 'octopus, daikon, kimchi vinaigrette', 'img' => 'img/menu/tako_salad.jpeg']);
//        Meal::create(['name' => 'Fried Green Tomatoes', 'price' => 35, 'description' => 'spinach, sea beans, cheese sauce', 'img' => 'img/menu/fried_green_tomatoes.jpg']);
//
//        Meal::create(['name' => 'Ribs & Chips', 'price' => 40, 'description' => 'barbecue sauce, pineapple chutney', 'img' => 'img/menu/ribs_and_chips.jpg']);
//        Meal::create(['name' => 'Caesar', 'price' => 55, 'description' => 'romaine, anchovies, croutons', 'img' => 'img/menu/caesar.jpeg']);
//        Meal::create(['name' => 'NY Strip Steak', 'price' => 70, 'description' => 'crumbled blue cheese, garlic', 'img' => 'img/menu/ny_strip_steak.jpeg']);
//        Meal::create(['name' => 'Duck Breast', 'price' => 40, 'description' => 'pear ginger sauce, yam puree', 'img' => 'img/menu/duck_breast.jpg']);
//
//        // Populate weekly_menu table
//
//        // Monday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 1;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 2;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 3;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 1;
//        $weekly_menu->meal_id = 4;
//        $weekly_menu->save();
//
//        // Tuesday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 5;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 6;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 7;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 2;
//        $weekly_menu->meal_id = 8;
//        $weekly_menu->save();
//
//        // Wednesday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 9;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 10;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 11;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 3;
//        $weekly_menu->meal_id = 12;
//        $weekly_menu->save();
//
//        // Thursday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 13;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 14;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 15;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 4;
//        $weekly_menu->meal_id = 16;
//        $weekly_menu->save();
//
//        // Friday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 17;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 18;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 19;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 5;
//        $weekly_menu->meal_id = 20;
//        $weekly_menu->save();
//
//        // Saturday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 6;
//        $weekly_menu->meal_id = 21;
//        $weekly_menu->save();
//
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
//        // Sunday
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 25;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 26;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 27;
//        $weekly_menu->save();
//
//        $weekly_menu = new WeeklyMenu();
//        $weekly_menu->day = 0;
//        $weekly_menu->meal_id = 28;
//        $weekly_menu->save();

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
    }
}
