<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/student/navbar.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/post.scss') }}">
    <style>
        .profile-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .profile-section {
            display: flex;
            align-items: center;
            gap: 30px;
            background: #f9f9f9;
            padding: 40px;
            border-radius: 10px;
        }
        .profile-picture {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #ddd;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-info {
            flex: 1;
            font-size: 18px;
        }
        .profile-info p {
            margin: 10px 0;
        }
        .profile-info p strong {
            font-size: 18px;
        }
        .btn-save {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-save:hover {
            background: #0056b3;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .btn-back {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #0056b3; /* Warna abu-abu */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-back:hover {
            background: #022547;
        }
        /* Styling untuk form password */
        .password-change-form {
            display: none; /* Form password disembunyikan pertama kali */
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }
        .password-change-form input {
            margin-bottom: 10px;
        }
        .toggle-password-form {
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Edit Profil Siswa</h1>

        <!-- Form Edit Profil -->
        <form action="{{ route('updateprofile', ['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="profile-section">
                <div class="profile-picture">
                    <!-- Memeriksa apakah gambar profil ada, jika tidak tampilkan gambar default -->
                    <img class="profile-personalization-picture" 
                        src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/ec9b92f3-6100-471d-8d8c-42e2ccd004e0.jpg') }}" 
                        alt="Profile Picture">
                </div>

                <div class="profile-info">
                    <div class="form-group">
                        <label for="profile_picture">Gambar Profil</label>
                        <input type="file" id="profile_picture" name="profile_picture">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ Auth::user()->username }}" required>
                    </div>

                    <!-- Link untuk mengubah password -->
                    <div class="form-group">
                        <span id="change-password-link" class="toggle-password-form">Ubah Password</span>
                    </div>
                    
                    <!-- Form Password (tersembunyi awalnya) -->
                    <div id="password-change-form" class="password-change-form">
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" id="current_password" name="current_password" placeholder="Masukkan password lama">
                        </div>
                    
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" id="new_password" name="new_password" placeholder="Masukkan password baru">
                        </div>
                    
                        <div class="form-group">
                            <label for="confirm_new_password">Konfirmasi Password Baru</label>
                            <input type="password" id="confirm_new_password" name="new_password_confirmation" placeholder="Konfirmasi password baru">
                        </div>
                    </div>

                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                    <a href="{{ route('student.profile') }}" class="btn-back">Kembali</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Script JavaScript untuk menampilkan dan menyembunyikan form password -->
    <script>
        document.getElementById('change-password-link').addEventListener('click', function(e) {
            e.preventDefault();
            
            var passwordChangeForm = document.getElementById('password-change-form');
            if (passwordChangeForm.style.display === "none" || passwordChangeForm.style.display === "") {
                passwordChangeForm.style.display = "block";
            } else {
                passwordChangeForm.style.display = "none";
            }
        });
    </script>
</body>
</html>
