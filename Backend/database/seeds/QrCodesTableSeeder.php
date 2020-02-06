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
        // Create QRcodes
        $qr_code = new QrCode();
        $qr_code->code = 'HvmEvy2I';
        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMsAAADLAQMAAAD6NfVwAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAOpJREFUWIXtlzsOhDAMRGdFQckRchSORo6Wo+wRKClWGH/YKELQ2yJTEOSXZuSMCUBX1/s0kWhDKtgHfd8DoS8/ho2XhRephEIz7YP6kh1EOR46fcVEgO2IhlC78XDYHCPLMtvLDzF3jKrmm5p3JL7UUAH9xjWVJRBCIvpoTT4Ba2qb4h7ZUZITxTuk0Fh2j2BONNIYuTk5FsqwKcpoRTOIAiCTNEXmEafiKseoTlH84xAJce1sit47mxMVAZ3XHo40x0GXeEhzMNGdL/eIyiJT9K4pnhHsP2XO1ykaANUsm6/LpcI36up6kw7E9S7TZOeGPAAAAABJRU5ErkJggg==';
        $qr_code->max_scan_times = 10;
        $qr_code->save();

        $qr_code = new QrCode();
        $qr_code->code = 'gglLllTm';
        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMsAAADLAQMAAAD6NfVwAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAO1JREFUWIXtlrERgzAMRb+PgjIjMAqj4dEYhRFSUnAo+jLhAoFeOvwLbPTc/JNlCaiqep5eQs3oRqyN7ddAaNJPM+sy6MJIKNTL2pgvnhDJ8dDmKyYCyoloCHs2bi6bY1RqWe3lmzJ3jHb1FzHviL7M0AhZ2nc3DoGQGsqM6cZS8lMOIZAk619DWoCTL+eISUnMhmSAy7FSfCMmJYkwVn6PN8o72u19p5846PCKWhs7H/eMJrB/sQ7EcpNDoW1ksGyYvXho4sjQshP8+QqA9DHVV1QrOxRCmdloqL26bJ7RVsvWCWATfxxUVfUkfQBRM0gXnTTq1AAAAABJRU5ErkJggg==';
        $qr_code->max_scan_times = 10;
        $qr_code->save();

        $qr_code = new QrCode();
        $qr_code->code = 'gt8P4GXZ';
        $qr_code->img = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMsAAADLAQMAAAD6NfVwAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAOlJREFUWIXtl7sNhDAQRMciuJASKMWlQWmU4hIICRB7OzaHuF/uEZ7E1j6Skb2zBmhqup96o9Y+AXuX97sQ8hq6tbd59IUVKRRtJ7JjmQRRipMswvDXV9UI+UYVX6wooVcvE/1p82qRtDyB4L643fFYhjfL9SOzsAGDf7ERTRBC3svwq5Q4v8ok0EE05KdhXjsXGcTcDGYLogWjLwihy9mwHYAROuhIUbD2ednqRwllfgGh5JEUOt5sDFNjiuqhnKL0Fa9PfRXksi1Psy9fNSOU/xROXaaoFDr/EL2X/UbNPx6c1aKmpjvpCay8Y0X6vGltAAAAAElFTkSuQmCC';
        $qr_code->max_scan_times = 10;
        $qr_code->save();
    }
}