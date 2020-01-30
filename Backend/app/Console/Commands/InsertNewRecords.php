<?php

namespace App\Console\Commands;

use App\Meal;
use App\User;
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
        Meal::create(['name' => 'Pizza', 'price' => 40.0, 'description' => 'Much tasty.']);

//        User::find(1)->favoriteMeals()->save(Meal::first());

//        User::find(1)->ratings()->save(Meal::first(), ['stars' => 5, 'comment' => 'Very good food indeed.']);
    }
}
