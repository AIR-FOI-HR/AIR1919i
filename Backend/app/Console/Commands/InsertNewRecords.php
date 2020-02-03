<?php

namespace App\Console\Commands;

use App\Meal;
use App\QrCode;
use App\Rating;
use App\User;
use App\WeeklyMenu;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

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
        // TODO => Place this code in DB seeders

        // Populate meals table

//        Meal::create(['name' => 'Salmon', 'price' => 70, 'description' => 'fried potatoes, garlic sauce, calamari squid', 'img' => 'img/menu/salmon.jpeg']);
//        Meal::create(['name' => 'Kobe Beef', 'price' => 115, 'description' => 'onion, grilled tomatoes, potatoes side dish', 'img' => 'img/menu/kobe_beef.jpeg']);
//        Meal::create(['name' => 'Minced Meat', 'price' => 35, 'description' => 'olives, home baked bread, mushrooms', 'img' => 'img/menu/minced_meat.jpg']);
//        Meal::create(['name' => 'Sausages', 'price' => 40, 'description' => 'original slavonian homemade sausages', 'img' => 'img/menu/sausages.jpg']);
//
//        Meal::create(['name' => 'Eggs', 'price' => 30, 'description' => 'florentine two poached eggs, spinach', 'img' => 'img/menu/eggs.jpg']);
//        Meal::create(['name' => 'Chicken', 'price' => 60, 'description' => 'wrapped in ham & sage', 'img' => 'img/menu/chicken.jpg']);
//        Meal::create(['name' => 'Royal Fillet', 'price' => 55, 'description' => 'formans smoked salmon', 'img' => 'img/menu/royal_fillet.jpg']);
//        Meal::create(['name' => 'Pudding Podium', 'price' => 18, 'description' => 'salted caramel chocolate pots', 'img' => 'img/menu/pudding_podium.jpg']);
//
//        Meal::create(['name' => 'Grilled Meat', 'price' => 42, 'description' => 'grilled vegetables, bread', 'img' => 'img/menu/grilled_meat.jpg']);
//        Meal::create(['name' => 'Pizza', 'price' => 52, 'description' => 'ham, cheese, mushrooms, olives', 'img' => 'img/menu/pizza.jpeg']);
//        Meal::create(['name' => 'Scotch Lobster', 'price' => 110, 'description' => 'salad, nicoise style, vegetables', 'img' => 'img/menu/scotch_lobster.jpeg']);
//        Meal::create(['name' => 'Crostata Al Limone', 'price' => 75, 'description' => 'lemon tart, sweet pastry', 'img' => 'img/menu/crostata_al_limone.jpeg']);
//
//        Meal::create(['name' => 'Macaroni', 'price' => 35, 'description' => 'cheese, parmesan, side dish', 'img' => 'img/menu/macaroni.jpg']);
//        Meal::create(['name' => 'Plum Tart', 'price' => 40, 'description' => 'pastry tart with plums', 'img' => 'img/menu/plum_tart.jpeg']);
//        Meal::create(['name' => 'Panna Cotta', 'price' => 45, 'description' => 'vanilla, rum flavoured cream', 'img' => 'img/menu/pana_cotta.jpg']);
//        Meal::create(['name' => 'French Toast', 'price' => 60, 'description' => 'fruit salad, maple flavoured syrup', 'img' => 'img/menu/french_toast.jpeg']);
//
//        Meal::create(['name' => 'French Breakfast', 'price' => 25, 'description' => 'scrambled eggs, bacon, mushrooms', 'img' => 'img/menu/french_breakfast,jpg']);
//        Meal::create(['name' => 'Corn Soup', 'price' => 35, 'description' => 'dungeness crab gratin, chipotle gelee', 'img' => 'img/menu/corn_soup.jpeg']);
//        Meal::create(['name' => 'Lobster Rolls', 'price' => 90, 'description' => 'house made old bay potato chips', 'img' => 'img/menu/lobster_rolls.jpeg']);
//        Meal::create(['name' => 'Prime Rib', 'price' => 60, 'description' => 'garlic, mustard rub, horseradish', 'img' => 'img/menu/prime_rib.jpeg']);
//
//        Meal::create(['name' => 'Seafood Stew', 'price' => 40, 'description' => 'prawns, mussels, calamari, market catch', 'img' => 'img/menu/seafood_stew.jpeg']);
//        Meal::create(['name' => 'Scallops', 'price' => 75, 'description' => 'fennel, prosciutto, black bean sauce', 'img' => 'img/menu/scallops.jpg']);
//        Meal::create(['name' => 'Tako Salad', 'price' => 45, 'description' => 'octopus, daikon, kimchi vinaigrette', 'img' => 'img/menu/tako_salad.jpeg']);
//        Meal::create(['name' => 'Green Tomatoes', 'price' => 35, 'description' => 'spinach, sea beans, cheese sauce', 'img' => 'img/menu/green_tomatoes.jpg']);
//
//        Meal::create(['name' => 'Ribs & Chips', 'price' => 40, 'description' => 'barbecue sauce, pineapple chutney', 'img' => 'img/menu/ribs_and_chips.jpg']);
//        Meal::create(['name' => 'Caesar Salad', 'price' => 55, 'description' => 'romaine, anchovies, croutons', 'img' => 'img/menu/caesar_salad.jpg']);
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
//
//        // Populate users table
//
//        User::create([
//            'name' => 'Toni Krešić',
//            'email' => 'tonikresic1997@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/Toni.jpeg'
//        ]);
//
//        User::create([
//            'name' => 'Claudia Kupreš',
//            'email' => 'claudiakupres@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/DefaultUserImage.png'
//        ]);
//
//        User::create([
//            'name' => 'Rosemary Jensen',
//            'email' => 'rosemary.jensen@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/3.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Vernon Weaver',
//            'email' => 'vermon.weaver@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/92.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Jared Collins',
//            'email' => 'jared.collins@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/33.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Dianne Kelley',
//            'email' => 'dkelley@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/48.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Sofia Larson',
//            'email' => 'sofia.larson@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/77.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Jeffrey Pearson',
//            'email' => 'jeffrey.pearson@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/47.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Fernando Rodriguez',
//            'email' => 'fernando.rodriguez@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/8.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Allison Hart',
//            'email' => 'allison.hart@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/72.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Perry Powell',
//            'email' => 'perry.powell@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/79.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Christine Medina',
//            'email' => 'christine.medina@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/2.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Bessie Palmer',
//            'email' => 'bessie.palmer@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/45.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Alexa Simpson',
//            'email' => 'alexa.simpson@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/40.jpg'
//        ]);
//
//        User::create([
//            'name' => 'April Gray',
//            'email' => 'april.gray@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/75.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Kristina Anderson',
//            'email' => 'kristina.anderson@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/55.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Stella Vargas',
//            'email' => 'stella.vargas@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/29.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Randall Medina',
//            'email' => 'randall.medina@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/32.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Hailey Edwards',
//            'email' => 'hailey.edwards@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/23.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Brayden Lopez',
//            'email' => 'brayden.lopez@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/67.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Cory Beck',
//            'email' => 'cory.beck@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/99.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Jerome Holt',
//            'email' => 'jerome.holt@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/24.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Kenneth Ramos',
//            'email' => 'kenneth.ramos@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/95.jpg'
//        ]);
//
//        User::create([
//            'name' => 'Edward Barnett',
//            'email' => 'edward.barnett@gmail.com',
//            'password' => Hash::make(102030),
//            'img' => 'img/users/22.jpg'
//        ]);
//
//        // Populate user_favorite_meals table
//
//        User::find(1)->favoriteMeals()->attach([1,4,7,9]);
//        User::find(2)->favoriteMeals()->attach([26,25,23,11,16]);
//        User::find(3)->favoriteMeals()->attach([13,16]);
//        User::find(4)->favoriteMeals()->attach([3,27,25,24,11,17,12,15]);
//        User::find(5)->favoriteMeals()->attach([28,27,26,25]);
//        User::find(6)->favoriteMeals()->attach([11,12,13,14]);
//        User::find(7)->favoriteMeals()->attach([19,18,17,16]);
//        User::find(8)->favoriteMeals()->attach([8,7,6,5,4,3,2,1]);
//        User::find(9)->favoriteMeals()->attach([28,25,21,19,15,17]);
//        User::find(10)->favoriteMeals()->attach([9,7]);
//        User::find(11)->favoriteMeals()->attach([15,16,17,18]);
//        User::find(12)->favoriteMeals()->attach([22,23,12,7,5,2]);
//        User::find(13)->favoriteMeals()->attach([9,19,11,16,27]);
//        User::find(14)->favoriteMeals()->attach([1,2,4,7,9,11,20,28,26]);
//        User::find(15)->favoriteMeals()->attach([1,16,14,13]);
//        User::find(16)->favoriteMeals()->attach([27,25,21,1]);
//        User::find(17)->favoriteMeals()->attach([27,11,13,5]);
//        User::find(18)->favoriteMeals()->attach([5,26,22,21]);
//        User::find(19)->favoriteMeals()->attach([1,5,7,8,2,11,16]);
//        User::find(20)->favoriteMeals()->attach([17,23,28]);
//        User::find(21)->favoriteMeals()->attach([21,11,14,16,1,4]);
//        User::find(22)->favoriteMeals()->attach([6,2,14,17]);
//        User::find(23)->favoriteMeals()->attach([11,17,12,16,19]);
//        User::find(24)->favoriteMeals()->attach([2,9,7,5,1]);
//
//        // Populate ratings table
//
//        Rating::create([
//            'meal_id' => 1,
//            'user_id' => 1,
//            'stars' => 4,
//            'comment' => 'It was much better than I expected. After my meal, I was knocked into a food coma. I was happy to see how clean everything was. I removed a star because the hostess made a pass at me. So uncomfortable.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 2,
//            'user_id' => 2,
//            'stars' => 3,
//            'comment' => 'I had high hopes for this place. Some of my favorite dishes are no longer available. The chicken was a little dry. 3 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 3,
//            'user_id' => 3,
//            'stars' => 5,
//            'comment' => 'OMG! So good! I found the ambiance to be very charming. Make sure to save room for dessert, because that was the best part of the meal! They got a new customer for life!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 4,
//            'user_id' => 4,
//            'stars' => 5,
//            'comment' => 'This is one of my favorite places. I want to hire their decorator to furnish my house. The appetizers must be sprinkled with crack because I just craved for more and more. 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 5,
//            'user_id' => 5,
//            'stars' => 4,
//            'comment' => 'Decent place. This was one of the best mouth-watering steaks I\'ve had grace my taste buds in a long time. The waitress was prompt and polite. 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 6,
//            'user_id' => 6,
//            'stars' => 5,
//            'comment' => 'Best experience ever! The experience was heavenly as I was served a meal fit for God himself. After my meal, I was knocked into a food coma. This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 7,
//            'user_id' => 7,
//            'stars' => 4,
//            'comment' => 'I was pleasantly surprised. The steak was a little dry. Try out the huge selection of incredible appetizers. After my meal, I was knocked into a food coma. I had to take one star away because the chairs were a little sticky.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 8,
//            'user_id' => 8,
//            'stars' => 5,
//            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The waiter did an excellent job. After my meal, I was knocked into a food coma. I was happy to see how clean everything was. I\'m definitely coming back for more!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 9,
//            'user_id' => 9,
//            'stars' => 2,
//            'comment' => 'This place was nearby and I decided to check it out. Seriously, how difficult is it to get a clean glass around here? There were bits of food stuck to my silverware. I added one star because they gave me free bread.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 10,
//            'user_id' => 10,
//            'stars' => 5,
//            'comment' => 'Best experience ever! The appetizers must be sprinkled with crack because I just craved for more and more. Everything was simply decadent. I want to hire their decorator to furnish my apartment. Everything was just so yummy. They got a new customer for life!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 11,
//            'user_id' => 11,
//            'stars' => 1,
//            'comment' => 'Dreadful place. My water glass was stained with lipstick and had bits of food floating in it. Too many things on the menu look like crap, smell like crap, and taste like crap. 1 star was too generous.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 12,
//            'user_id' => 12,
//            'stars' => 4,
//            'comment' => 'This place had a lot of heart. After my meal, I was knocked into a food coma. The appetizers must be sprinkled with crack because I just craved for more and more. There were a lot of interesting decorations on the walls. The waitress did an excellent job. I could see myself being a regular here.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 13,
//            'user_id' => 13,
//            'stars' => 4,
//            'comment' => 'It was much better than I expected. Everything I tried was bursting with flavor. I was happy to see how clean everything was. The food was flavorful, savory, and succulent. I could see myself being a regular here.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 14,
//            'user_id' => 14,
//            'stars' => 5,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Everything was simply decadent. The appetizers must be sprinkled with crack because I just craved for more and more. After my meal, I was knocked into a food coma. I\'d give more than 5 stars if I could!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 15,
//            'user_id' => 15,
//            'stars' => 2,
//            'comment' => 'Bleh. This place is very dumpy and in a serious need of a fresh paint job. I heard a rumor that the vegetarian dishes are prepared alongside the meat. The menu didn\'t match the one on their website. 2 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 16,
//            'user_id' => 16,
//            'stars' => 3,
//            'comment' => 'This is one of my favorite places. Make sure to save room for dessert, because that was the best part of the meal! Everything I tried was bursting with flavor. The experience was heavenly as I was served a meal fit for God himself. The waitress was prompt and polite. This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 17,
//            'user_id' => 17,
//            'stars' => 5,
//            'comment' => 'It was much better than I expected. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. After my meal, I was knocked into a food coma. Overall experience: 5 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 18,
//            'user_id' => 18,
//            'stars' => 5,
//            'comment' => 'Oh my God! So yummy! I was happy to see how clean everything was. Everything from the starters to the entrees to the desserts meshed perfectly with my flavor-profile. The waiter was prompt and polite. This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 19,
//            'user_id' => 19,
//            'stars' => 5,
//            'comment' => 'Yumm-o! After my meal, I was knocked into a food coma. I want to hire their decorator to furnish my house. The food was flavorful, savory, and succulent. I\'m definitely coming back for more!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 20,
//            'user_id' => 20,
//            'stars' => 4,
//            'comment' => 'I have been here several times before. I found the entrees to be very agreeable to my personal flavor-profile. I want to hire their decorator to furnish my house. Overall experience: 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 21,
//            'user_id' => 21,
//            'stars' => 4,
//            'comment' => 'I have been here several times before. The entrees are simply to die for. There were a lot of interesting decorations on the walls. Try out the huge selection of incredible appetizers. It could have been perfect, but the wait to get in was so long.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 22,
//            'user_id' => 22,
//            'stars' => 5,
//            'comment' => 'It was much better than I expected. Make sure to save room for dessert, because that was the best part of the meal! Everything was just so yummy. I want to hire their decorator to furnish my house. They got a new customer for life!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 23,
//            'user_id' => 23,
//            'stars' => 4,
//            'comment' => 'I was pleasantly surprised. The food was flavorful, savory, and succulent. The decor was unique and incredible. The waiter did an excellent job. Overall experience: 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 24,
//            'user_id' => 24,
//            'stars' => 4,
//            'comment' => 'Decent place. The food was flavorful, savory, and succulent. The waiter was prompt and polite. I had a satisfactory experience and will have to try it again.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 25,
//            'user_id' => 1,
//            'stars' => 5,
//            'comment' => 'Oh! My! God! So awesome! The food was flavorful, savory, and succulent. The waiter was prompt and polite. Easily earned their 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 26,
//            'user_id' => 2,
//            'stars' => 5,
//            'comment' => 'Oh my God! So yummy! The decor was unique and incredible. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. After my meal, I was knocked into a food coma. The waiter was prompt and polite. Overall experience: 5 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 27,
//            'user_id' => 3,
//            'stars' => 5,
//            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The waiter was prompt and polite. The food was flavorful, savory, and succulent. I was happy to see how clean everything was. Make sure to save room for dessert, because that was the best part of the meal! I would eat here every day if I could afford it!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 28,
//            'user_id' => 4,
//            'stars' => 5,
//            'comment' => 'Oh! My! God! So good! The appetizers must be sprinkled with crack because I just craved for more and more. I found the ambiance to be very charming. Everything was simply decadent. After my meal, I was knocked into a food coma. Overall experience: 5 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 1,
//            'user_id' => 6,
//            'stars' => 3,
//            'comment' => 'I have been here several times before. The food was all right but seriously lacked presentation. Some of my favorite dishes are no longer available. The service wasn\'t that good and the waitress was tired. The ambiance gives off an earthy feel-good vibe. This place deserves its very average rating.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 2,
//            'user_id' => 5,
//            'stars' => 5,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. The desserts must be sprinkled with crack because I just craved for more and more. Everything was just so yummy. They got a new customer for life!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 3,
//            'user_id' => 9,
//            'stars' => 5,
//            'comment' => 'Yumm-o! The food was flavorful, savory, and succulent. Everything was just so yummy. Easily earned their 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 4,
//            'user_id' => 10,
//            'stars' => 4,
//            'comment' => 'This place had a lot of heart. The service was good for the most part but the waiter was a bit tired. The food is simply to die for. I found the ambiance to be very charming. Satisfactory experience, will come again.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 5,
//            'user_id' => 1,
//            'stars' => 5,
//            'comment' => 'Yummers! The food is simply to die for. I want to hire their decorator to furnish my apartment. After my meal, I was knocked into a food coma. Try out the huge selection of incredible appetizers. Overall experience: 5 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 6,
//            'user_id' => 2,
//            'stars' => 4,
//            'comment' => 'Decent place. I found the entrees to be very agreeable to my personal flavor-profile. The decor was unique and incredible. The desserts must be sprinkled with crack because I just craved for more and more. I was happy to see how clean everything was. It could have been perfect, but the waiter made a pass at me. So inappropriate.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 7,
//            'user_id' => 4,
//            'stars' => 5,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Make sure to save room for dessert, because that was the best part of the meal! The food was flavorful, savory, and succulent. I\'m definitely coming back for more!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 8,
//            'user_id' => 7,
//            'stars' => 4,
//            'comment' => 'It was much better than I expected. The food was flavorful, savory, and succulent. The ambiance gives off an earthy feel-good vibe. After my meal, I was knocked into a food coma. It could have been perfect, but the wait to get in was so long.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 9,
//            'user_id' => 8,
//            'stars' => 3,
//            'comment' => 'I felt like this place wasn\'t trying hard enough. There were a lot of interesting decorations on the walls. The service wasn\'t that good and the waitress was clueless. The tofu dish tasted spongy and a bit bland. Might be back. Time will tell.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 10,
//            'user_id' => 3,
//            'stars' => 4,
//            'comment' => 'I was pleasantly surprised. There were a lot of interesting decorations on the walls. The appetizers must be sprinkled with crack because I just craved for more and more. The entree I had was sublime. Everything I tried was bursting with flavor. It failed to meet the 5-star experience because the chairs were a little sticky.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 11,
//            'user_id' => 11,
//            'stars' => 5,
//            'comment' => 'Yummers! The experience was heavenly as I was served a meal fit for God himself. Everything I tried was bursting with flavor. Overall experience: 5 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 12,
//            'user_id' => 15,
//            'stars' => 5,
//            'comment' => 'My taste buds are still singing from our last visit! Try out the huge selection of incredible appetizers. The waiter was prompt and polite. 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 13,
//            'user_id' => 19,
//            'stars' => 3,
//            'comment' => 'I\'m torn about this place. I found the entrees to be somewhat agreeable to my personal flavor-profile. Overhyped. The menu didn\'t match the one on their website. The service wasn\'t that good and the waiter was rude. 3 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 14,
//            'user_id' => 13,
//            'stars' => 4,
//            'comment' => 'Decent place. I was happy to see how clean everything was. Everything was mostly decadent. Everything I tried was bursting with flavor. Satisfactory experience, will come again.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 15,
//            'user_id' => 20,
//            'stars' => 3,
//            'comment' => 'I felt like this place was trying too hard. The service wasn\'t that good and the waiter was tired. The pork was undercooked. Overall, this place is just okay. I might come back.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 16,
//            'user_id' => 18,
//            'stars' => 4,
//            'comment' => 'I have been here several times before. I found the entrees to be very agreeable to my personal flavor-profile. I want to hire their decorator to furnish my apartment. I had to take one star away because the chairs were a little sticky.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 17,
//            'user_id' => 12,
//            'stars' => 5,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. The food was cooked to perfection. I want to hire their decorator to furnish my house. I would eat here every day if I could afford it!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 18,
//            'user_id' => 16,
//            'stars' => 4,
//            'comment' => 'This place had a lot of heart. Everything I tried was bursting with flavor. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. After my meal, I was knocked into a food coma. It failed to meet the 5-star experience because the waitress had really bad body odor.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 19,
//            'user_id' => 17,
//            'stars' => 4,
//            'comment' => 'Decent place. Everything was mostly decadent. The ambiance gives off an earthy feel-good vibe. The waitress was prompt and polite. Everything I tried was bursting with flavor. Overall experience: 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 20,
//            'user_id' => 20,
//            'stars' => 3,
//            'comment' => 'This place was nearby and I decided to check it out. The photos of the food were appetizing and palpable, but didn\'t live up to the hype. Overhyped. 3 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 21,
//            'user_id' => 21,
//            'stars' => 4,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Make sure to save room for dessert, because that was the best part of the meal! The decor was unique and incredible. After my meal, I was knocked into a food coma. I removed a star because the busboy kept looking at me funny the whole time.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 22,
//            'user_id' => 1,
//            'stars' => 4,
//            'comment' => 'Decent place. The desserts must be sprinkled with crack because I just craved for more and more. After my meal, I was knocked into a food coma. The food is simply to die for. The ambiance gives off an earthy feel-good vibe. I docked them one star because the waitress had really bad body odor.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 23,
//            'user_id' => 3,
//            'stars' => 5,
//            'comment' => 'OMG! So yummy! I want to hire their decorator to furnish my house. The waiter did an excellent job. Everything was simply decadent. Try out the huge selection of incredible appetizers. I\'m definitely coming back for more!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 24,
//            'user_id' => 24,
//            'stars' => 1,
//            'comment' => 'Terrible! Too many things on the menu look like crap, smell like crap, and taste like crap. I threw up in my mouth a little when they brought me my food. The center of my steak was so frozen it started singing "Let It Go." The food sucked. The service sucked. Everything sucked. Wild horses couldn\'t drag me back here.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 25,
//            'user_id' => 7,
//            'stars' => 2,
//            'comment' => 'This place was just ok. Some of my favorite dishes are no longer available. Overhyped. The burger was overcooked. I heard a rumor that the vegetarian dishes are prepared alongside the meat. I gave this place two stars because I was feeling extra generous.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 26,
//            'user_id' => 11,
//            'stars' => 3,
//            'comment' => 'This place was just ok. The tofu dish tasted spongy and a bit bland. The service wasn\'t that good and the waitress was tired. 3 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 27,
//            'user_id' => 19,
//            'stars' => 5,
//            'comment' => 'This is one of my favorite places. The food was cooked to perfection. The decor was unique and incredible. Easily earned their 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 28,
//            'user_id' => 15,
//            'stars' => 4,
//            'comment' => 'Decent place. After my meal, I was knocked into a food coma. This was one of the best mouth-watering steaks I\'ve had grace my taste buds in a long time. It failed to meet the 5-star experience because the waiter made a pass at me. So gross.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 1,
//            'user_id' => 24,
//            'stars' => 4,
//            'comment' => 'This place had a lot of heart. The service was good for the most part but the waitress was a bit rude. I was happy to see how clean everything was. After my meal, I was knocked into a food coma. 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 2,
//            'user_id' => 23,
//            'stars' => 5,
//            'comment' => 'Best experience ever! Make sure to save room for dessert, because that was the best part of the meal! This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. Everything I tried was bursting with flavor. I was happy to see how clean everything was. This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 3,
//            'user_id' => 22,
//            'stars' => 5,
//            'comment' => 'My taste buds are still singing from our last visit! The experience was heavenly as I was served a meal fit for God himself. The waiter was prompt and polite. I was happy to see how clean everything was. I\'d give more than 5 stars if I could!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 4,
//            'user_id' => 21,
//            'stars' => 5,
//            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The appetizers must be sprinkled with crack because I just craved for more and more. I found the ambiance to be very charming. I\'m definitely coming back for more!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 5,
//            'user_id' => 20,
//            'stars' => 5,
//            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! Everything was just so yummy. Everything from the starters to the entrees to the desserts meshed perfectly with my flavor-profile. The decor was unique and incredible. They got a new customer for life!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 6,
//            'user_id' => 19,
//            'stars' => 4,
//            'comment' => 'This place was nearby and I decided to check it out. After my meal, I was knocked into a food coma. The ambiance gives off an earthy feel-good vibe. Everything was just so yummy. It could have been perfect, but the waiter had really bad body odor.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 7,
//            'user_id' => 18,
//            'stars' => 5,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. Make sure to save room for dessert, because that was the best part of the meal! The decor was unique and incredible. This was one of the best mouth-watering steaks I\'ve had grace my taste buds in a long time. I\'m definitely coming back for more!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 8,
//            'user_id' => 17,
//            'stars' => 4,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. The entree I had was sublime. The service was good for the most part but the waiter was a bit rude. I could see myself being a regular here.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 9,
//            'user_id' => 16,
//            'stars' => 5,
//            'comment' => 'Yummers! The appetizers must be sprinkled with crack because I just craved for more and more. After my meal, I was knocked into a food coma. The decor was unique and incredible. The experience was heavenly as I was served a meal fit for God himself. I would eat here every day if I could afford it!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 10,
//            'user_id' => 15,
//            'stars' => 5,
//            'comment' => 'Yummers! I was happy to see how clean everything was. The desserts must be sprinkled with crack because I just craved for more and more. Everything was simply decadent. I want to hire their decorator to furnish my house. Easily earned their 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 11,
//            'user_id' => 14,
//            'stars' => 5,
//            'comment' => 'Oh my God! So awesome! The food was flavorful, savory, and succulent. The waiter was prompt and polite. Easily earned their 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 12,
//            'user_id' => 13,
//            'stars' => 5,
//            'comment' => 'Yummers! The food was cooked to perfection. The waiter was prompt and polite. I would eat here every day if I could afford it!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 13,
//            'user_id' => 12,
//            'stars' => 4,
//            'comment' => 'It was much better than I expected. The food was cooked to perfection. The decor was unique and incredible. The waiter did an excellent job. Overall experience: 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 14,
//            'user_id' => 11,
//            'stars' => 2,
//            'comment' => 'I had high hopes for this place. Too many things on the menu look like crap, smell like crap, and taste like crap. I heard a rumor that the vegetarian dishes are prepared alongside the meat. The waitress was mediocre at best. Everything tasted either microwaved or straight from a can. They need to get their act together before I set foot in this place again.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 15,
//            'user_id' => 10,
//            'stars' => 5,
//            'comment' => 'It was much better than I expected. Everything from the starters to the entrees to the desserts meshed perfectly with my flavor-profile. After my meal, I was knocked into a food coma. Easily earned their 5 stars!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 16,
//            'user_id' => 9,
//            'stars' => 5,
//            'comment' => 'Yumm-o! The entrees are simply to die for. Everything I tried was bursting with flavor. Make sure to save room for dessert, because that was the best part of the meal! This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 17,
//            'user_id' => 8,
//            'stars' => 4,
//            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Try out the huge selection of incredible appetizers. The service was good for the most part but the waitress was a bit slow. The ambiance gives off an earthy feel-good vibe. The food was cooked to perfection. I could see myself being a regular here.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 18,
//            'user_id' => 7,
//            'stars' => 5,
//            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The decor was unique and incredible. The food was cooked to perfection. This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 19,
//            'user_id' => 6,
//            'stars' => 4,
//            'comment' => 'I was pleasantly surprised. The entree I had was sublime. I was happy to see how clean everything was. Try out the huge selection of incredible appetizers. 4 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 20,
//            'user_id' => 5,
//            'stars' => 1,
//            'comment' => 'Gross! I heard a rumor that the vegetarian dishes are prepared alongside the meat. This place is very dumpy and in a serious need of a makeover. Too many things on the menu look like crap, smell like crap, and taste like crap. I gave 1 star because I couldn\'t give 0.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 21,
//            'user_id' => 4,
//            'stars' => 4,
//            'comment' => 'I have been here several times before. I found the entrees to be very agreeable to my personal flavor-profile. I want to hire their decorator to furnish my apartment. The service was good for the most part but the waiter was a bit unprofessional. I removed a star because my water glass was dirty.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 22,
//            'user_id' => 3,
//            'stars' => 2,
//            'comment' => 'This place is a waste of calories. This place is very dumpy and in a serious need of a makeover. The tofu dish tasted spongy and a bit bland. Seriously, how difficult is it to get a clean glass around here? Overall experience: 2 stars.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 23,
//            'user_id' => 2,
//            'stars' => 5,
//            'comment' => 'Best experience ever! The entrees are simply to die for. Try out the huge selection of incredible appetizers. The waitress did an excellent job. I would eat here every day if I could afford it!'
//        ]);
//
//        Rating::create([
//            'meal_id' => 24,
//            'user_id' => 1,
//            'stars' => 5,
//            'comment' => 'This is one of my favorite places. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. The waitress did an excellent job. After my meal, I was knocked into a food coma. This is definitely a spot I\'ll be frequenting.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 25,
//            'user_id' => 15,
//            'stars' => 4,
//            'comment' => 'I have been here several times before. The entree I had was sublime. I want to hire their decorator to furnish my apartment. Try out the huge selection of incredible appetizers. Everything I tried was bursting with flavor. 4 stars of satisfaction.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 26,
//            'user_id' => 4,
//            'stars' => 4,
//            'comment' => 'This place was nearby and I decided to check it out. The waitress was prompt and polite. Try out the huge selection of incredible appetizers. The food was cooked to perfection. I would have rated this higher, but the floors were a little sticky.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 27,
//            'user_id' => 22,
//            'stars' => 3,
//            'comment' => 'Decent place. Some of my favorite dishes are no longer available. The food was all right but seriously lacked presentation. There were a lot of interesting decorations on the walls. Might be back. Time will tell.'
//        ]);
//
//        Rating::create([
//            'meal_id' => 28,
//            'user_id' => 16,
//            'stars' => 4,
//            'comment' => 'This place had a lot of heart. The food was cooked to perfection. The waiter was prompt and polite. The ambiance gives off an earthy feel-good vibe. It failed to meet the 5-star experience because my wine glass was dirty.'
//        ]);
//
//
//        // Populate qr_codes table
//
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

        // TODO => Populate qr_code_user table
    }
}
