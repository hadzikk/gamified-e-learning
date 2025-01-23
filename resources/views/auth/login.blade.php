<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-content-wrapper">
            <div class="login-link-container">
                <a href="/" class="login-link-back"><i class="fa-solid fa-arrow-left-long"></i></a>
            </div>

            <form class="login-form" action="/oa/account-security/login" method="POST">
                @csrf
                <h1 class="login-title">Kerjakan kuis jadilah yang terbaik</h1>
                <p class="login-description">Ayo mulai!</p>
                
                <div class="login-textbox-container">
                    <i class="icon fa-solid fa-fingerprint"></i>
                    <input type="text" name="email" class="login-textbox-input" placeholder="Masukkan nama pengguna...">
                </div>

                <div class="login-textbox-container">
                    <i class="fa-solid fa-wand-sparkles"></i>
                    <input type="password" name="password" class="login-textbox-input" placeholder="Masukkan kata sandi...">
                </div>

                <button type="submit" class="button-submit">Masuk</button>
            </form>
        </div>

        <div class="login-content-wrapper">
            <div class="login-image-container">
                <img src="{{ asset('images/cute aesthetic gradient background with blue, red, pink, white aura and noise for iPhone wallpaper.jpg') }}" alt="Login Image" class="login-image-cover">
            </div>
        </div>
    </div>

    @if (session()->has('isInvalid'))
    <div class="popup-authentication-status">
        <div class="popup-status-message">
            <span>Status Message</span>
            <span class="close">✖</span>
        </div>
    </div>
    @endif

    <x-global.footer></x-global.footer>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>