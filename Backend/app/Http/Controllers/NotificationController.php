<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required',
        ]);

        // Redirect back if the validator fails
        if ($validator->fails()) return redirect()->back();

        Log::info('Sending notifications to users.');

        // Select users with firebase token, subscribed to notifications and which have one of their favorite meals on todays menu
        $tokens = User::select('id', 'firebase_token')
            ->whereNotNull('firebase_token')
            ->where('subscribed_to_notifications', 1)
            ->whereHas('favoriteMeals')
            ->whereHas('favoriteMeals.weeklyMenu', function ($query) {
                $query->where('day', Carbon::today()->dayOfWeek ?? 7);
            })
            ->get()
            ->pluck('firebase_token')
            ->toArray();

        // If no users found return false
        if (count($tokens) == 0) {
            Log::info('No users with firebase tokens found.');
            return redirect()->back();
        }

        // Try to send the message via Firebase Cloud Messaging using the key given during the app regsitration
        try {
            $client = new \GuzzleHttp\Client();
            $client->request('POST', 'https://fcm.googleapis.com/fcm/send', [
                'headers' => [
                'Authorization' => 'key=AAAAGhc8vGI:APA91bEnvWj7dPeM4kMhiGJsSjVQL4tp99B_AA8mGaqF6Gm7s1yAJyRVmNe_hem4Csv_ZQ39D0NmynFJjB03Iem10uW29leOs0cXoeL178yxnyFIA7PjNQJLrnBl9I6LG2IOv9f3-3Vl',
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'registration_ids' => $tokens,
                    'notification' => [
                        'title' => $request->title,
                        'body' => $request->message,
                        'sound' => 'default'
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::warning('Notification sending failed with error: ' . $e->getMessage());
        }

        Log::info('Successfully sent notifications to ' . count($tokens) . ' users.');
        return redirect()->back();
    }
}