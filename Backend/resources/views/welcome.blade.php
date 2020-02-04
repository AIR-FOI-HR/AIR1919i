<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bistro Deno Backend</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="{{ asset('/img/favicon.ico') }}"/>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                margin-top: 200px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn {
                position: relative;
                font-weight: bold;

                display: inline-block;
                margin: 30px auto;
                padding: 10px 20px;

                overflow: hidden;

                border-width: 0;
                outline: none;
                border-radius: 2px;
                box-shadow: 0 1px 4px rgba(0, 0, 0, .6);

                background-color: #2ecc71;
                color: #ecf0f1;

                transition: background-color .3s;
                text-decoration: none;
            }

            .btn:hover, .btn:focus {
                background-color: #27ae60;
            }

            .btn > * {
                position: relative;
            }

            .btn span {
                display: block;
                padding: 12px 24px;
            }

            .btn:before {
                content: "";

                position: absolute;
                top: 50%;
                left: 50%;

                display: block;
                width: 0;
                padding-top: 0;

                border-radius: 100%;

                background-color: rgba(236, 240, 241, .3);

                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .btn:active:before {
                width: 120%;
                padding-top: 120%;

                transition: width .2s ease-out, padding-top .2s ease-out;
            }
            .btn.orange {
                background-color: #e67e22;
            }

            .btn.orange:hover, .btn.orange:focus {
                background-color: #d35400;
                cursor: pointer;
            }

            fieldset {
                margin: 0 0 3rem;
                padding: 0;
                border: none;
            }

            form {
                margin-top: 50px;
            }

            .form-group {
                position: relative;
                margin-top: 2.25rem;
                margin-bottom: 2.25rem;
            }

            .form-inline > .form-group,
            .form-inline > .btn {
                display: inline-block;
                margin-bottom: 0;
            }

            .form-group input {
                font-family: 'Nunito', sans-serif;
                height: 1.9rem;
            }
            .form-group textarea {
                font-family: 'Nunito', sans-serif;
                resize: none;
            }
            .form-group select {
                width: 100%;
                font-size: 1rem;
                height: 1.6rem;
                padding: 0.125rem 0.125rem 0.0625rem;
                background: none;
                border: none;
                line-height: 1.6;
                box-shadow: none;
            }
            .form-group .control-label {
                position: absolute;
                top: 0.25rem;
                left: 0;
                pointer-events: none;
                padding-left: 0.125rem;
                z-index: 1;
                color: #b3b3b3;
                font-size: 1rem;
                font-weight: normal;
                -webkit-transition: all 0.28s ease;
                transition: all 0.28s ease;
            }
            .form-group .bar {
                position: relative;
                border-bottom: 0.0625rem solid #999;
                display: block;
            }
            .form-group .bar::before {
                content: '';
                height: 0.125rem;
                width: 0;
                left: 50%;
                bottom: -0.0625rem;
                position: absolute;
                background: #337ab7;
                -webkit-transition: left 0.28s ease, width 0.28s ease;
                transition: left 0.28s ease, width 0.28s ease;
                z-index: 2;
            }
            .form-group input,
            .form-group textarea {
                display: block;
                background: none;
                padding: 0.125rem 0.125rem 0.0625rem;
                font-size: 1rem;
                border-width: 0;
                border-color: transparent;
                line-height: 1.9;
                width: 100%;
                color: transparent;
                -webkit-transition: all 0.28s ease;
                transition: all 0.28s ease;
                box-shadow: none;
            }
            .form-group input[type="file"] {
                line-height: 1;
            }
            .form-group input[type="file"] ~ .bar {
                display: none;
            }
            .form-group select,
            .form-group input:focus,
            .form-group input:valid,
            .form-group textarea:focus,
            .form-group textarea:valid{
                color: #333;
            }
            .form-group select ~ .control-label,
            .form-group input:focus ~ .control-label,
            .form-group input:valid ~ .control-label,
            .form-group input.form-file ~ .control-label,
            .form-group input.has-value ~ .control-label,
            .form-group textarea:focus ~ .control-label,
            .form-group textarea:valid ~ .control-label,
            .form-group textarea.form-file ~ .control-label,
            .form-group textarea.has-value ~ .control-label {
                font-size: 0.8rem;
                color: gray;
                top: -1rem;
                left: 0;
            }
            .form-group select:focus,
            .form-group input:focus,
            .form-group textarea:focus {
                outline: none;
            }
            .form-group select:focus ~ .control-label,
            .form-group input:focus ~ .control-label,
            .form-group textarea:focus ~ .control-label {
                color: #337ab7;
            }
            .form-group select:focus ~ .bar::before,
            .form-group input:focus ~ .bar::before,
            .form-group textarea:focus ~ .bar::before {
                width: 100%;
                left: 0;
            }
            .width-50 {
                width: 50%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bistro Deno Backend
                </div>
                <form method="POST" action="{{ route('send-notification') }}">
                    @csrf
                    <div class="width-50">
                        <div class="form-group">
                            <input id="title" type="text" name="title" value="Your meal is on the menu today!" required>
                            <label for="input" class="control-label">Title</label>
                            <i class="bar"></i>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="2" required>One of your favorite meals is on the menu today. Check it out!</textarea>
                            <label for="textarea" class="control-label">Textarea</label>
                            <i class="bar"></i>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn orange">
                                    Send Notification
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="text-align: center;">
            <h1>Testing QRcodes</h1>
        </div>
        <div class="flex-center" style="margin-bottom: 100px;">
            @if($first_qr_code = \App\QrCode::find(1))
                <div style="display: flex; justify-content: center; width: 33%; text-align: center">
                    <div style="display: flex; justify-content: center;">
                        <div style="width: auto; text-align: center">
                            <span>QRcode scanned by User</span>
                            <br>
                            <span>Code: <b>{{ $first_qr_code->code }}</b></span>
                            <br>
                            <img height="125px" src="{{ $first_qr_code->img }}" alt="First Testing QRCode">
                        </div>
                    </div>
                </div>
            @endif
            @if($second_qr_code = \App\QrCode::find(2))
                <div style="display: flex; justify-content: center; width: 33%; text-align: center">
                    <div style="display: flex; justify-content: center;">
                        <div style="width: 33%; text-align: center">
                            <span>QRcode not scanned by User but scanned maximum number of times.</span>
                            <br>
                            <span>Code: <b>{{ $second_qr_code->code }}</b></span>
                            <br>
                            <img height="125px" src="{{ $second_qr_code->img }}" alt="Second Testing QRCode">
                        </div>
                    </div>
                </div>
            @endif
            @if($third_qr_code = \App\QrCode::find(3))
                <div style="display: flex; justify-content: center; width: 33%; text-align: center">
                    <div style="display: flex; justify-content: center;">
                        <div style="width: 33%; text-align: center">
                            <span>QRcode not scanned maximum number of times and not scanned by User.</span>
                            <br>
                            <span>Code: <b>{{ $third_qr_code->code }}</b></span>
                            <br>
                            <img height="125px" src="{{ $third_qr_code->img }}" alt="Third Testing QRCode">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </body>
</html>