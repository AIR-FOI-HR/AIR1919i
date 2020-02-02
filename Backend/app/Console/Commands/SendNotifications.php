<?php

namespace App\Console\Commands;

use App\Meal;
use App\User;
use App\WeeklyMenu;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends notifications to Users which have favorite meals on the menu today.';

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
        Log::info('Sending notifications to users');

        $tokens = User::select('id', 'firebase_token')
            ->whereNotNull('firebase_token')
            ->whereHas('favoriteMeals')
            ->whereHas('favoriteMeals.weeklyMenu', function ($query) {
                $query->where('day', Carbon::today()->dayOfWeek);
            })
            ->get()
            ->pluck('firebase_token')
            ->toArray();;

        if (count($tokens) == 0) {
            Log::info('No users with firebase tokens found.');
            return false;
        }

        try {
            $client = new \GuzzleHttp\Client();
            $client->request('POST', 'https://fcm.googleapis.com/fcm/send', [
                'headers' => [
                    'Authorization' => 'key=AAAAGhc8vGI:APA91bGY-j1-znJ_HFCSKmnMFUwheJPtt4r2w0M6HteJ0TS-Zb-w1TrnmqXJenmQpznQcnVQZlp8ZaaYCMp9G8_1zGSQuPIpjKLtB8NFy4Kgx-SNOg7iVyTmPXs_KgUMNJDmZRMks3yb',
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'registration_ids' => $tokens,
                    'notification' => [
                        'title' => 'Your meal is on the menu today!',
                        'body' => 'One of your favorite meals is on the menu today. Check it out!',
                        'sound' => 'default'
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::warning('Notification sending failed with error: ' . $e->getMessage());
        }

        Log::info('Successfully sent notifications to ' . count($tokens) . ' users.');
        return false;
    }
}