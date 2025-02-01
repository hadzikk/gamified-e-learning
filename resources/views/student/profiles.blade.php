<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
    <link rel="stylesheet" href="{{ asset('css/student/profile.scss') }}">
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>
    <i class="fa-solid fa-arrow-left-long"></i>
    <div class="profile">
        <div class="profile-content">
            {{-- <p class="profile-title">profil</p> --}}

            <div class="profile-card">
                <div class="profile-picture-wrapper">
                    <img class="profile-picture" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/wallpaper • car explosion.jpeg') }}">
                    <input class="profile-input-file" type="file" name="" id="">
                </div>

                <div class="profile-information-wrapper">
                    <div class="profile-information">
                        <p class="profile-information-title">nama pengguna</p>
                        <div class="profile-input-wrapper">
                            <i class="fa-regular fa-user icon"></i>
                            <input class="profile-input" type="text" placeholder="Masukkan nama pengguna...">
                            <i></i>
                        </div>
                    </div>
    
                    <div class="profile-information">
                        <p class="profile-information-title">kata sandi</p>
                        <div class="profile-input-wrapper">
                            <i class="fa-solid fa-lock icon"></i>
                            <input class="profile-input" type="password" placeholder="Masukkan kata sandi...">
                            <i class="fa-regular fa-eye-slash icon-password"></i>
                        </div>
                    </div>

                    <button class="button-submit">submit</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>