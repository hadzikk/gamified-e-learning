<div class="navigation">
    <div class="navigation-bar">
        <div class="bar-wrapper-items">
            <ul class="bar-list-container">
                <li class="bar-list {{ $title == 'home' ? '--active' : ''}}"><a class="bar-link {{ $title == 'home' ? '--active' : ''}}" href="/student/home">Home</a></li>
                <li class="bar-list {{ $title == 'post' ? '--active' : ''}}"><a class="bar-link {{ $title == 'post' ? '--active' : ''}}" href="/student/post">post</a></li>
            </ul>
        </div>

        <div class="bar-wrapper-profile">
            <div class="notification-container">
                <i class="fa-regular fa-envelope icon-notification"></i>
            </div>
            <div class="profile-picture-wrapper">
                <img class="profile-picture" 
                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/wallpaper • car explosion.jpeg') }}" 
                alt="Profile Picture">
            </div>

            {{-- Kotak Notifikasi --}}
            <div class="notification-bar-wrapper --hide">
                <p class="notification-bar-title">notifikasi</p>
                <div class="notification-row">
                    <div class="notification-icon-container">
                        <i class="fa-regular fa-chess-pawn"></i>
                    </div>
                    <div class="notification-text-container">
                        <p class="notification-text">Hi &commat;hadzikmochammad, sayang sekali anda harus turun level ke Basic. </p>
                    </div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="notification-row">
                    <div class="notification-icon-container">
                        <i class="fa-regular fa-chess-knight notification-icon-level"></i>
                    </div>
                    <div class="notification-text-container">
                        <p class="notification-text">Selamat &commat;hadzikmochammad anda telah berhasil naik ke level Advance!</p>
                    </div>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

            {{-- Popup navigasi profil --}}
            <div class="profile-navigation-wrapper --hide">
                <div class="profile-personalization">
                    <div class="box">
                        <div class="profile-personalization-image-container">
                            <img class="profile-personalization-picture" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/wallpaper • car explosion.jpeg') }}" 
                            alt="Profile Picture">
                        </div>
                    </div>
                    <div class="box">
                        <p class="profile-personalization-fullname">
                            {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                        </p>                        
                        <p class="profile-personalization-level">
                            @if (Auth::user() && Auth::user()->score > 500)
                            Proficient
                            @elseif (Auth::user() && Auth::user()->score > 300)
                                Advance
                            @elseif (Auth::user() && Auth::user()->score > 0)
                                Basic
                            @else
                                Belum memiliki skor
                            @endif
                        </p>
                        <p class="profile-personalization-score">{{ Auth::user()->score }}</p>
                    </div>
                </div>
                <ul class="profile-navigation-list-container">
                    <li class="profile-navigation-list">
                        <a class="profile-navigation-link" href="{{ route('profile.edit', Auth::user()->id) }}">
                            <i class="fa-solid fa-user"></i>&nbsp; profil
                        </a>
                    </li>
                    <li class="profile-navigation-list"><a class="profile-navigation-link" href="#" id="logout"><i class="fa-solid fa-power-off"></i>&nbsp; keluar</a></li>
                </ul>
                <div class="logout-wrapper">
                    <form action="/oa/account-security/logout" method="post">
                        @csrf
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>