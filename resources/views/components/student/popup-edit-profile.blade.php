<div class="popup-edit-profile --hide" id="popup-edit-profile">
    <div class="popup-confirm-card">
        <div class="popup-confirm-navigation">
            <p class="popup-navigation-title">Edit profile/{{ Auth::user()->username }}</p>
            <i class="fa-solid fa-xmark close"></i>
        </div>
        <div class="popup-info">
            <div class="popup-info-items">
                <i class="fa-solid fa-unlock symbol"></i>
                <p class="confirmation-message">Untuk konfirmasi, ketik "saya-ingin-memperbarui-profil" dibawah.</p>
            </div>
        </div>
        <div class="popup-confirmation">
                <input class="popup-input" type="text">
                <button class="popup-submit --disabled" type="submit" disabled>perbarui</button>
        </div>
    </div>
</div>