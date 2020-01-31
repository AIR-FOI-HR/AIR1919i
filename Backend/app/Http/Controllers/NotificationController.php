<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function index()
    {
        // TODO => Get users which have firebase_tokens, which have favorite meals and if their favorite meal is on today's week menu
        $tokens = User::select('firebase_token')
            ->whereNotNull('firebase_token')
            ->get()
            ->pluck('firebase_token')
            ->toArray();

        if (count($tokens) == 0) return;
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
    }
}