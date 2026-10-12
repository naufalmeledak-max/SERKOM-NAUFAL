<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Informasi Sekolah</title>

    {{-- Corona Icons --}}
    <link rel="stylesheet"
        href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    {{-- Bootstrap --}}
    <link rel="stylesheet"
        href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;

            font-family: "Segoe UI", Arial, sans-serif;

            background:
                radial-gradient(circle at top left, rgba(0, 123, 255, 0.25), transparent 35%),
                radial-gradient(circle at bottom right, rgba(111, 66, 193, 0.25), transparent 35%),
                #0d1117;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #ffffff;
        }

        /* Background dekorasi */

        .background-circle {
            position: fixed;
            border-radius: 50%;
            filter: blur(2px);
            opacity: 0.25;
            pointer-events: none;
        }

        .circle-one {
            width: 280px;
            height: 280px;

            background: #0099ff;

            top: -100px;
            left: -80px;
        }

        .circle-two {
            width: 350px;
            height: 350px;

            background: #6f42c1;

            bottom: -150px;
            right: -100px;
        }

        /* Login wrapper */

        .login-wrapper {
            width: 100%;
            max-width: 1050px;

            margin: 30px;

            display: flex;

            background: rgba(255, 255, 255, 0.06);

            border: 1px solid rgba(255, 255, 255, 0.12);

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.45);

            backdrop-filter: blur(15px);
        }

        /* Bagian kiri */

        .login-info {
            width: 50%;

            padding: 60px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    rgba(0, 153, 255, 0.18),
                    rgba(111, 66, 193, 0.15)
                );
        }

        .logo-icon {
            width: 70px;
            height: 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 18px;

            background: linear-gradient(
                135deg,
                #0099ff,
                #6f42c1
            );

            box-shadow:
                0 10px 30px rgba(0, 153, 255, 0.3);

            margin-bottom: 25px;
        }

        .logo-icon i {
            font-size: 36px;
            color: #ffffff;
        }

        .login-info h1 {
            font-size: 32px;
            font-weight: 700;

            margin-bottom: 15px;
        }

        .login-info h1 span {
            color: #0099ff;
        }

        .login-info p {
            color: #b8c1cc;

            font-size: 15px;

            line-height: 1.7;

            max-width: 430px;

            margin-bottom: 30px;
        }

        .feature {
            display: flex;
            align-items: center;

            margin-bottom: 15px;

            color: #d8dee6;

            font-size: 14px;
        }

        .feature i {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 12px;

            border-radius: 10px;

            background: rgba(0, 153, 255, 0.12);

            color: #0099ff;

            font-size: 18px;
        }

        /* Bagian kanan */

        .login-form {
            width: 50%;

            padding: 60px;

            background: rgba(15, 20, 28, 0.85);
        }

        .login-header {
            margin-bottom: 35px;
        }

        .login-header h2 {
            margin: 0 0 8px;

            font-size: 28px;

            font-weight: 700;
        }

        .login-header p {
            margin: 0;

            color: #8d98a7;

            font-size: 14px;
        }

        /* Alert error */

        .alert-error {
            padding: 12px 15px;

            margin-bottom: 20px;

            border-radius: 10px;

            background: rgba(255, 82, 82, 0.12);

            border: 1px solid rgba(255, 82, 82, 0.25);

            color: #ff8b8b;

            font-size: 13px;
        }

        /* Input */

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;

            font-weight: 600;

            color: #d8dee6;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;

            left: 16px;
            top: 50%;

            transform: translateY(-50%);

            color: #7f8a99;

            font-size: 19px;

            z-index: 2;
        }

        .form-control-custom {
            width: 100%;

            height: 52px;

            padding: 0 16px 0 48px;

            border: 1px solid #303846;

            border-radius: 10px;

            outline: none;

            background: #171d26;

            color: #ffffff;

            font-size: 14px;

            transition: all 0.2s ease;
        }

        .form-control-custom::placeholder {
            color: #687383;
        }

        .form-control-custom:focus {
            border-color: #0099ff;

            background: #1a212c;

            box-shadow:
                0 0 0 3px rgba(0, 153, 255, 0.12);
        }

        /* Button */

        .btn-login {
            width: 100%;

            height: 52px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #0099ff,
                #0077cc
            );

            color: #ffffff;

            font-size: 14px;

            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;

            box-shadow:
                0 8px 20px rgba(0, 153, 255, 0.2);
        }

        .btn-login:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(0, 153, 255, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
            margin-right: 7px;
        }

        /* Footer */

        .login-footer {
            margin-top: 30px;

            text-align: center;

            color: #687383;

            font-size: 12px;
        }

        /* Responsive */

        @media (max-width: 768px) {

            .login-wrapper {
                max-width: 480px;

                margin: 20px;

                display: block;
            }

            .login-info {
                width: 100%;

                padding: 35px;
            }

            .login-info h1 {
                font-size: 25px;
            }

            .feature {
                display: none;
            }

            .login-form {
                width: 100%;

                padding: 35px;
            }
        }

        @media (max-width: 480px) {

            .login-wrapper {
                margin: 15px;

                border-radius: 18px;
            }

            .login-info,
            .login-form {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

    {{-- Background Decoration --}}
    <div class="background-circle circle-one"></div>
    <div class="background-circle circle-two"></div>


    <div class="login-wrapper">

        {{-- ========================================= --}}
        {{-- BAGIAN KIRI --}}
        {{-- ========================================= --}}

        <div class="login-info">

            <div class="logo-icon">
                <i class="mdi mdi-school"></i>
            </div>

            <h1>
                Sistem Informasi
                <span>Sekolah</span>
            </h1>

            <p>
                Selamat datang di sistem informasi sekolah.
                Silakan login untuk mengelola data sekolah,
                informasi akademik, berita, pengumuman,
                dan kegiatan sekolah.
            </p>

            <div class="feature">
                <i class="mdi mdi-school-outline"></i>
                <span>Manajemen Data Sekolah</span>
            </div>

            <div class="feature">
                <i class="mdi mdi-newspaper-variant-outline"></i>
                <span>Berita dan Pengumuman</span>
            </div>

            <div class="feature">
                <i class="mdi mdi-account-group-outline"></i>
                <span>Pengelolaan Data Guru & Siswa</span>
            </div>

        </div>


        {{-- ========================================= --}}
        {{-- BAGIAN KANAN --}}
        {{-- ========================================= --}}

        <div class="login-form">

            <div class="login-header">

                <h2>Selamat Datang 👋</h2>

                <p>
                    Silakan login untuk masuk ke sistem.
                </p>

            </div>


            {{-- Error Login --}}

            @if ($errors->any())

                <div class="alert-error">

                    <i class="mdi mdi-alert-circle-outline"></i>

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- Form Login --}}

            <form action="{{ route('login') }}" method="POST">

                @csrf


                {{-- Username --}}

                <div class="form-group">

                    <label class="form-label" for="name">
                        Username
                    </label>

                    <div class="input-wrapper">

                        <i class="mdi mdi-account-outline"></i>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control-custom"
                            placeholder="Masukkan username"
                            value="{{ old('name') }}"
                            autocomplete="username"
                            required
                        >

                    </div>

                </div>


                {{-- Password --}}

                <div class="form-group">

                    <label class="form-label" for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <i class="mdi mdi-lock-outline"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control-custom"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                    </div>

                </div>


                {{-- Login Button --}}

                <button type="submit" class="btn-login">

                    <i class="mdi mdi-login"></i>

                    LOGIN

                </button>

            </form>


            <div class="login-footer">

                © {{ date('Y') }} Sistem Informasi Sekolah

            </div>

        </div>

    </div>

</body>

</html>
