<div class="student-profile">
    <div class="student-profile-navigation">
        <div class="student-profile-navigation-icons">
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </div>

    <div class="student-header-profile">
        <div class="student-picture-container">
            <img class="student-picture" src="{{ $profile_picture }}" alt="">
        </div>
        <div class="student-name-container">
            <div class="student-name-overlay">
                <p class="student-full-name">{{ $full_name }}</p>
                <p class="student-username">{{ $username }}</p>
            </div>
        </div>
    </div>

    <div class="student-progress-bar mt-12">
        <div class="student-progress-bar-level-badge-container">
            <i class="fa-regular fa-chess-knight"></i>
            <span class="student-level-hieararchy">{{ $level }}</span>
        </div>
        <div class="student-progress-container">
            <span class="student-current-level">lvl. 0</span>
            <input class="student-level-progress" type="range" min="0" max="32" value="0" name="" id="">
            <span class="student-upcoming-level">1</span>
        </div>
    </div>
    
    <div class="student-middle-profile">
        <div class="student-badges-container">
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
            <div class="student-badge-container">
                <img class="student-badge" src="" alt="">
            </div>
        </div>
    </div>


    <div class="student-footer-profile">
        <div class="student-footer-icons">
            <i class="fa-brands fa-spotify"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-linkedin"></i>
        </div>
    </div>

    <div class="student-profile-description">
        <p class="student-description">{{ $description }}</p>
    </div>
</div>