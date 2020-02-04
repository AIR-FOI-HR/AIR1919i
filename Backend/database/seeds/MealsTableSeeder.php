<?php

use App\Meal;
use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::create(['name' => 'Salmon', 'price' => 70, 'description' => 'fried potatoes, garlic sauce, calamari squid', 'img' => 'img/menu/salmon.jpeg']);
        Meal::create(['name' => 'Kobe Beef', 'price' => 115, 'description' => 'onion, grilled tomatoes, potatoes side dish', 'img' => 'img/menu/kobe_beef.jpeg']);
        Meal::create(['name' => 'Minced Meat', 'price' => 35, 'description' => 'olives, home baked bread, mushrooms', 'img' => 'img/menu/minced_meat.jpg']);
        Meal::create(['name' => 'Sausages', 'price' => 40, 'description' => 'original slavonian homemade sausages', 'img' => 'img/menu/sausages.jpg']);

        Meal::create(['name' => 'Eggs', 'price' => 30, 'description' => 'florentine two poached eggs, spinach', 'img' => 'img/menu/eggs.jpg']);
        Meal::create(['name' => 'Chicken', 'price' => 60, 'description' => 'wrapped in ham & sage', 'img' => 'img/menu/chicken.jpg']);
        Meal::create(['name' => 'Royal Fillet', 'price' => 55, 'description' => 'formans smoked salmon', 'img' => 'img/menu/royal_fillet.jpg']);
        Meal::create(['name' => 'Pudding Podium', 'price' => 18, 'description' => 'salted caramel chocolate pots', 'img' => 'img/menu/pudding_podium.jpg']);

        Meal::create(['name' => 'Grilled Meat', 'price' => 42, 'description' => 'grilled vegetables, bread', 'img' => 'img/menu/grilled_meat.jpg']);
        Meal::create(['name' => 'Pizza', 'price' => 52, 'description' => 'ham, cheese, mushrooms, olives', 'img' => 'img/menu/pizza.jpeg']);
        Meal::create(['name' => 'Scotch Lobster', 'price' => 110, 'description' => 'salad, nicoise style, vegetables', 'img' => 'img/menu/scotch_lobster.jpeg']);
        Meal::create(['name' => 'Crostata Al Limone', 'price' => 75, 'description' => 'lemon tart, sweet pastry', 'img' => 'img/menu/crostata_al_limone.jpeg']);

        Meal::create(['name' => 'Macaroni', 'price' => 35, 'description' => 'cheese, parmesan, side dish', 'img' => 'img/menu/macaroni.jpg']);
        Meal::create(['name' => 'Plum Tart', 'price' => 40, 'description' => 'pastry tart with plums', 'img' => 'img/menu/plum_tart.jpeg']);
        Meal::create(['name' => 'Panna Cotta', 'price' => 45, 'description' => 'vanilla, rum flavoured cream', 'img' => 'img/menu/panna_cotta.jpg']);
        Meal::create(['name' => 'French Toast', 'price' => 60, 'description' => 'fruit salad, maple flavoured syrup', 'img' => 'img/menu/french_toast.jpeg']);

        Meal::create(['name' => 'French Breakfast', 'price' => 25, 'description' => 'scrambled eggs, bacon, mushrooms', 'img' => 'img/menu/french_breakfast.jpg']);
        Meal::create(['name' => 'Corn Soup', 'price' => 35, 'description' => 'dungeness crab gratin, chipotle gelee', 'img' => 'img/menu/corn_soup.jpeg']);
        Meal::create(['name' => 'Lobster Rolls', 'price' => 90, 'description' => 'house made old bay potato chips', 'img' => 'img/menu/lobster_rolls.jpeg']);
        Meal::create(['name' => 'Prime Rib', 'price' => 60, 'description' => 'garlic, mustard rub, horseradish', 'img' => 'img/menu/prime_rib.jpeg']);

        Meal::create(['name' => 'Seafood Stew', 'price' => 40, 'description' => 'prawns, mussels, calamari, market catch', 'img' => 'img/menu/seafood_stew.jpeg']);
        Meal::create(['name' => 'Scallops', 'price' => 75, 'description' => 'fennel, prosciutto, black bean sauce', 'img' => 'img/menu/scallops.jpg']);
        Meal::create(['name' => 'Tako Salad', 'price' => 45, 'description' => 'octopus, daikon, kimchi vinaigrette', 'img' => 'img/menu/tako_salad.jpeg']);
        Meal::create(['name' => 'Green Tomatoes', 'price' => 35, 'description' => 'spinach, sea beans, cheese sauce', 'img' => 'img/menu/green_tomatoes.jpg']);

        Meal::create(['name' => 'Ribs & Chips', 'price' => 40, 'description' => 'barbecue sauce, pineapple chutney', 'img' => 'img/menu/ribs_and_chips.jpg']);
        Meal::create(['name' => 'Caesar Salad', 'price' => 55, 'description' => 'romaine, anchovies, croutons', 'img' => 'img/menu/caesar_salad.jpg']);
        Meal::create(['name' => 'NY Strip Steak', 'price' => 70, 'description' => 'crumbled blue cheese, garlic', 'img' => 'img/menu/ny_strip_steak.jpeg']);
        Meal::create(['name' => 'Duck Breast', 'price' => 40, 'description' => 'pear ginger sauce, yam puree', 'img' => 'img/menu/duck_breast.jpg']);
    }
}