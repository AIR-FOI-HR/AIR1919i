<?php

use App\User;
use Illuminate\Database\Seeder;

class UserFavoriteMealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fill user_favorite_meals table
        User::find(1)->favoriteMeals()->attach([1,4,7,9]);
        User::find(2)->favoriteMeals()->attach([26,25,23,11,16]);
        User::find(3)->favoriteMeals()->attach([13,16]);
        User::find(4)->favoriteMeals()->attach([3,27,25,24,11,17,12,15]);
        User::find(5)->favoriteMeals()->attach([28,27,26,25]);
        User::find(6)->favoriteMeals()->attach([11,12,13,14]);
        User::find(7)->favoriteMeals()->attach([19,18,17,16]);
        User::find(8)->favoriteMeals()->attach([8,7,6,5,4,3,2,1]);
        User::find(9)->favoriteMeals()->attach([28,25,21,19,15,17]);
        User::find(10)->favoriteMeals()->attach([9,7]);
        User::find(11)->favoriteMeals()->attach([15,16,17,18]);
        User::find(12)->favoriteMeals()->attach([22,23,12,7,5,2]);
        User::find(13)->favoriteMeals()->attach([9,19,11,16,27]);
        User::find(14)->favoriteMeals()->attach([1,2,4,7,9,11,20,28,26]);
        User::find(15)->favoriteMeals()->attach([1,16,14,13]);
        User::find(16)->favoriteMeals()->attach([27,25,21,1]);
        User::find(17)->favoriteMeals()->attach([27,11,13,5]);
        User::find(18)->favoriteMeals()->attach([5,26,22,21]);
        User::find(19)->favoriteMeals()->attach([1,5,7,8,2,11,16]);
        User::find(20)->favoriteMeals()->attach([17,23,28]);
        User::find(21)->favoriteMeals()->attach([21,11,14,16,1,4]);
        User::find(22)->favoriteMeals()->attach([6,2,14,17]);
        User::find(23)->favoriteMeals()->attach([11,17,12,16,19]);
        User::find(24)->favoriteMeals()->attach([2,9,7,5,1]);
    }
}