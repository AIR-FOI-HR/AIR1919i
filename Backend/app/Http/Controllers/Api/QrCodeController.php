<?php

namespace App\Http\Controllers\Api;

use App\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QrCodeController extends ApiController
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
        if (!$user = auth()->setRequest($request)->user()) return $this->responseUnauthorized();

        $validator = Validator::make($request->all(), ['code' => 'required|string|size:32']);

        // Validate incoming request
        if ($validator->fails()) return $this->responseUnprocessable($validator->errors());

        // Check if QRCode exists
        if (!$qr_code = QrCode::where('code', $request->code)->first()) return response()->json(['message' => 'You already scanned this QRCode.'], 422);

        // Check if User already scanned the QRCode
        if ($user->QrCodes->contains($qr_code->id)) return response()->json(['message' => 'You already scanned this QRCode.'], 422);

        // Check if QRCode already scanned maximum number of times
        if ($qr_code->users->count() >= $qr_code->max_scan_times) return response()->json(['message' => 'QRCode already scanned maximum number of times'], 422);

        // Populate pivot table
        $user->QrCodes()->attach($qr_code->id);

        // Check Users's current number of signatures and increment it
        if ($user->signatures_count == 10) $user->signatures_count = 0;
        $user->signatures_count++;
        $user->save();

        return response()->json(['message' => 'Successfully scanned the QRCode.'], 200);
    }
}