<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
        .btn-edit, .btn-back {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-edit {
            background: #007bff;
        }
        .btn-edit:hover {
            background: #0056b3;
        }
        .btn-back {
            background: #28a745;
        }
        .btn-back:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Profil Siswa</h1>

        <!-- Menampilkan Data Profil -->
        <div class="profile-section">
            <!-- Foto Profil -->
            <div class="profile-picture">
                <!-- Memeriksa apakah gambar profil ada, jika tidak tampilkan gambar default -->
                <img class="profile-personalization-picture" 
                     src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/ec9b92f3-6100-471d-8d8c-42e2ccd004e0.jpg') }}" 
                     alt="Profile Picture">
                <p style="text-align: center; font-weight: bold; margin-top: 10px;">{{ $student->username }}</p>
            </div>

            <!-- Informasi Pengguna -->
            <div class="profile-info">
                <p><strong>Username:</strong> {{ $student->username }}</p>
                <p><strong>Nama Depan:</strong> {{ $student->first_name }}</p>
                <p><strong>Nama Belakang:</strong> {{ $student->last_name }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                
                <!-- Tombol Edit Profil -->
                <a href="{{ route('profile.edit', $student->id) }}" class="btn-edit">Edit Profil</a>
                
                <!-- Tombol Kembali ke Halaman Postingan -->
                <a href="/student/post" class="btn-back">Kembali ke Postingan</a>
            </div>
        </div>
    </div>

<script src="{{ asset('js/event.js') }}"></script>

</body>
</html>
