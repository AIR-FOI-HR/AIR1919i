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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back();

        Log::info('Sending notifications to users.');

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
            return redirect()->back();
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