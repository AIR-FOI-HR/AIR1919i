<?php

namespace App\Http\Controllers;

use App\QrCode;
use App\User;

class TestingController extends Controller
{
    public function index()
    {
        $user = User::first();

        if (!$qr_code = QrCode::where('code', 'Y68LJCUin67bPfPGGLKV38v7rkNPQixd')->first()) return false;

        // Check if User already scanned the QRCode
        if ($user->QrCodes->contains($qr_code->id)) return 'User already scanned the QRCode.';

        if ($qr_code->users->count() >= $qr_code->max_scan_times) return 'QRCode already scanned maximum amount of times.';

        $user->QrCodes()->attach($qr_code->id);

        return 'Success.';
    }
}
