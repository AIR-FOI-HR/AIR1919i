<?php

use App\QrCode;
use Illuminate\Database\Seeder;

class QrCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qr_code = new QrCode();
        $qr_code->code = '0XaYtF2IWz8mcFo31SmonV1W5NvlIP6Z';
        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOcAAADnAQMAAADfOtNjAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAUhJREFUWIXtmDGSgzAMReWhoOQIPgpHw0fjKDkCZQqPtV+yncBstto0n7EaHL80H0nfMiIjRoz4Rixq8VweawpZ8PDfD2Zqi+n5eqypb/LSVQu2IVImCF2Tq78BtQyqHnIbKtiG3ntQ8WJUTepdluRDxVLRt2/URP7lKjS0R9RamvIxmOiiu0AvalKLp24Ll7fBRyXumx1T1QmPuEu5vAZCCqGh6jUnrImkptZXIc+Qa11mpemGSEwtg37w2np2b8/X/NJRpE4ztsX/hJ4r09kJ+WjzDU+k2zoyeKpJSopiROqaYUTXezBTC/gGZG+a36cxOW2y/fYkUiuUlzaF3mza7hrKTaHQ59h9qxPFtWIp6ev2VAf0NirRU6zQZbNn8XRaMdNoGXQazl1GSaV/Vyn9hvu7Yqlod3P79jXbHOv2QUxHjBjxv/gBIagDHqXVCVEAAAAASUVORK5CYII=';
        $qr_code->max_scan_times = 10;
        $qr_code->save();

        $qr_code = new QrCode();
        $qr_code->code = '6zu958HB8wM39fpqcNchkhaFUSmlE4SI';
        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOcAAADnAQMAAADfOtNjAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAATFJREFUWIXtlzESwjAMBC+TgpIn8JQ8LXlansITKFNkLHSSgTCECprLWE1srRtNzicLaNGixT/ibIzFV2N8hthflSkX/YKLWek9PUyPpC4dPL2cmU7qZR+Bsl6nNxyHMo5CEZr0WwacvilWiqZvUJMpzT1XkaJvh/wP7oYU9fSUFY62wi/bhKpQXTqP3XpioSXu3IQ3TQpSV2Fn1duXV/XiNH6dGcse+BGnboFh6paajLNQpjbD01RhqQrdditBigv30XiZ9rPd1tsFafSnVGEWSheRpnRzPslZ6JpNS52+yi6IdNl4uyLdvJH2Zg1FykUfYqz2YdmNhWnOg954n5r8nHAFKR7dKnzRDkCjW3HQnce6E6YITbINR7fiWPihWClafcNpvigQ9iFMW7Ro8VvcAd6O/CvdyOt6AAAAAElFTkSuQmCC';
        $qr_code->max_scan_times = 10;
        $qr_code->save();
    }
}