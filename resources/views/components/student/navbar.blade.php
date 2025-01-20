<div class="navigation">
    <div class="navigation-bar">
        <div class="bar-wrapper-items">
            <ul class="bar-list-container">
                <li class="bar-list"><a class="bar-link" href="">home</a></li>
                <li class="bar-list --active"><a class="bar-link --active" href="">post</a></li>
                <li class="bar-list"><a class="bar-link" href="">tentang</a></li>
            </ul>
        </div>

        <div class="bar-wrapper-profile">
            <div class="profile-picture-wrapper">
                <img class="profile-picture" src="{{ asset('images/hadzik.jpeg') }}" alt="" class="profile-picture">
            </div>
            <div class="profile-navigation-wrapper --hide">
                <ul class="profile-navigation-list-container">
                    <li class="profile-navigation-list"><a class="profile-navigation-link" href=""><i class="fa-regular fa-user"></i>&nbsp; profil</a></li>
                    <li class="profile-navigation-list"><a class="profile-navigation-link" href="#"><i class="fa-solid fa-power-off"></i>&nbsp; keluar</a></li>
                </ul>
                <form action="/oa/account-security/logout" method="post">
                    @csrf
                    <button type="submit"></button>
                </form>
            </div>
        </div>
    </div>
</div>