<?php

namespace App\Http\Controllers\Api;

use App\QrCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QrCodeApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // Authenticate user
//        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        $user = User::find(1);

        $validator = Validator::make($request->all(), ['code' => 'required|string|size:8']);

        // Validate incoming request
        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        // Check if QRCode exists
        if (!$qr_code = QrCode::where('code', $request->code)->first()) return response()->json(['message' => 'Wrong input.'], 200);

        // Check if User already scanned the QRCode
        if ($user->qrCodes->contains($qr_code->id)) return response()->json(['message' => 'You already scanned this QRCode.'], 200);

        // Check if QRCode already scanned maximum number of times
        if ($qr_code->users->count() >= $qr_code->max_scan_times) return response()->json(['message' => 'QRCode already scanned maximum number of times.'], 200);

        // Populate pivot table
        $user->qrCodes()->attach($qr_code->id);

        // Check Users's current number of signatures and increment it
        if ($user->signatures_count == 10) $user->signatures_count = 0;
        $user->signatures_count++;
        $user->save();

        return response()->json(['message' => 'Successfully scanned the QRCode.'], 200);
    }
}