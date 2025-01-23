<div class="navigation">
    <div class="navigation-bar">
        <div class="bar-wrapper-items">
            <ul class="bar-list-container">
                <li class="bar-list --active"><a class="bar-link --active" href="">post</a></li>
                <li class="bar-list"><a class="bar-link" href="">tentang</a></li>
            </ul>
        </div>

        <div class="bar-wrapper-profile">
            <div class="profile-picture-wrapper">
                <img class="profile-picture" 
                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/ec9b92f3-6100-471d-8d8c-42e2ccd004e0.jpg') }}" 
                alt="Profile Picture">

            </div>
            <div class="profile-navigation-wrapper --hide">
                <div class="profile-personalization">
                    <div class="box">
                        <div class="profile-personalization-image-container">
                            <img class="profile-personalization-picture" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/ec9b92f3-6100-471d-8d8c-42e2ccd004e0.jpg') }}" 
                            alt="Profile Picture">
                        </div>
                    </div>
                    <div class="box">
                        <p class="profile-personalization-fullname">
                            {{ Auth::user()->first_name . " " . Auth::user()->last_name }}
                        </p>                        
                        <p class="profile-personalization-level">
                            @if (Auth::user() && Auth::user()->score > 450)
                            Proficient
                            @elseif (Auth::user() && Auth::user()->score > 300)
                                Advance
                            @elseif (Auth::user() && Auth::user()->score > 0)
                                Basic
                            @else
                                Belum memiliki skor
                            @endif
                        </p>
                        <p class="profile-personalization-score">{{ Auth::user()->score }} / 450</p>
                    </div>
                </div>
                <ul class="profile-navigation-list-container">
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