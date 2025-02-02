<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/student/profile.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/student/popup-edit-profile.scss') }}">
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>

    <div class="profile-container">
        
        <a href="/student/post" class="btn-back"><i class="fa-solid fa-arrow-left-long"></i></a>
        <!-- Form Edit Profil -->
        <form class="profile-form" action="{{ route('updateprofile', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Foto Profil -->
            <div class="profile-section">
                <div class="profile-picture">
                    <!-- Memeriksa apakah gambar profil ada, jika tidak tampilkan gambar default -->
                    <img class="profile-personalization-picture" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/wallpaper • car explosion.jpeg') }}">
                    <input class="input-file" type="file" id="profile_picture" name="profile_picture">
                </div>

                <div class="profile-info">
                    <div class="form-input-wrapper">
                        <p class="form-input-title">nama pengguna</p>
                        <div class="form-group">
                            <input class="form-input" type="text" name="username" value="{{ Auth::user()->username }}" placeholder="Masukkan nama pengguna...">
                        </div>
                    </div>
                    <div class="form-input-wrapper">
                        <p class="form-input-title">kata sandi lama</p>
                        <div class="form-group">
                            <input class="form-input" type="password" name="current_password" placeholder="Masukkan kata sandi lama...">
                        </div>
                    </div>
                    <div class="form-input-wrapper">
                        <p class="form-input-title">kata sandi baru</p>
                        <div class="form-group">
                            <input class="form-input" type="password" name="new_password" placeholder="Buat kata sandi baru...">
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">submit</button>
                </div>
            </div>
        </form>
    </div>
    <x-student.popup-edit-profile></x-student.popup-edit-profile>

    <script>
        // Ambil elemen yang dibutuhkan
        const popupEditProfile = document.getElementById('popup-edit-profile');
        const closePopup = document.querySelector('.close');
        const submitProfileButton = document.querySelector('.btn-submit'); // Tombol utama
        const popupInput = document.querySelector('.popup-input');
        const popupSubmitButton = document.querySelector('.popup-submit');
        const profileForm = document.querySelector('.profile-form');
    
        // Tampilkan Popup saat tombol "Submit" di form utama ditekan
        submitProfileButton.addEventListener('click', (event) => {
            event.preventDefault(); // Mencegah submit langsung
            popupEditProfile.classList.remove('--hide'); // Tampilkan popup
        });
    
        // Tutup popup saat tombol close ditekan
        closePopup.addEventListener('click', () => {
            popupEditProfile.classList.add('--hide'); // Sembunyikan popup
            popupInput.value = ''; // Reset input
            popupSubmitButton.classList.add('--disabled'); // Kunci kembali tombol submit
            popupSubmitButton.disabled = true;
        });
    
        // Aktifkan tombol submit di popup jika input sesuai
        popupInput.addEventListener('input', () => {
            if (popupInput.value.trim() === "saya-ingin-memperbarui-profil") {
                popupSubmitButton.classList.remove('--disabled');
                popupSubmitButton.disabled = false;
            } else {
                popupSubmitButton.classList.add('--disabled');
                popupSubmitButton.disabled = true;
            }
        });
    
        // Kirim form utama saat tombol "Perbarui" ditekan di popup
        popupSubmitButton.addEventListener('click', () => {
            profileForm.submit(); // Kirim form utama
    
            // Reset popup kembali
            popupEditProfile.classList.add('--hide');
            popupInput.value = ''; // Reset input
            popupSubmitButton.classList.add('--disabled');
            popupSubmitButton.disabled = true;
        });
    </script>    
</body>
</html>
