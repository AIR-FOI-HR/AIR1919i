<?php

use App\QrCode;
use App\User;
use Illuminate\Database\Seeder;

class QrCodeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fill qr_code_user table
        User::find(1)->qrCodes()->attach([1]);
        QrCode::find(2)->users()->attach([2,3,4,5,6,7,8,9,10,11]);
        QrCode::find(3)->users()->attach([12,13,14,15,16]);
    }
}