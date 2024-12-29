<nav class="navbar">
    <div class="navbar-top-side">
        <p class="logo">e-learning</p>

        <div class="navbar-feature-container">
            <div class="search-container">
                <div class="search-environtment-container">
                    <div class="search-icon-container">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="search-text-box-container">
                        <input class="search-text-box" type="text" placeholder="Lakukan pencarian disini..">
                    </div>
                </div>
                <div class="search-filter-box-container">
                    <select class="search-filter-box" name="" id="">
                        <option value="">filter</option>
                        <option value="">mahasiswa</option>
                        <option value="">kuis</option>
                    </select>
                </div>
            </div>
            <i class="fa-regular fa-bell"></i>
            <div class="profile-picture-container">
                <img class="profile-picture" src="{{ $profile_picture }}" alt="">
            </div>
        </div>
    </div>
    <div class="navbar-bottom-side">
        <ul class="navbar-links-container">
            <li class="navbar-list"><x-nav-link :active="request()->is('home')" href="/home">home</x-nav-link></li>
            <li class="navbar-list"><x-nav-link :active="request()->is('profile')" href="/profile">profile</x-nav-link></li>
            <li class="navbar-list"><x-nav-link href="">halaman 3</x-nav-link></li>
            <li class="navbar-list"><x-nav-link href="">halaman 4</x-nav-link></li>
            <li class="navbar-list"><x-nav-link href="">halaman 5</x-nav-link></li>
        </ul>
    </div>
</nav>