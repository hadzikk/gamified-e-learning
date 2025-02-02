<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/student/navbar.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/home.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/post.scss') }}">

    <style>
        /* Styling untuk membuat card berada di tengah halaman */
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Membuat tinggi minimal 100% dari viewport */
            background: #f3f4f6;
            padding: 20px;
        }
        .profile-container {
            max-width: 600px;
            width: 100%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #ddd;
            margin: auto;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info p {
            margin: 8px 0;
            font-size: 18px;
        }
        .profile-score {
            margin-top: 15px;
            padding: 10px;
            background: #f3f3f3;
            border-radius: 8px;
            font-weight: bold;
        }
        .level-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }
        .level-basic { background: #3498db; }
        .level-advance { background: #f39c12; }
        .level-proficient { background: #2ecc71; }
        .level-none { background: #e74c3c; }
    </style>
</head>
<body>
    <x-student.navbar>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-student.navbar>
    
    <div class="main-container">
        <div class="profile-container">
            <!-- Foto Profil -->
            <div class="profile-picture">
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/wallpaper • car explosion.jpeg') }}" alt="Profile Picture">
            </div>

            <!-- Informasi Pengguna -->
            <div class="profile-info">
                <p class="text-gray-600">@ {{ $student->username }}</p>
                <p class="font-bold text-xl">{{ $student->first_name }} {{ $student->last_name }}</p>
                
                <!-- Menampilkan Score & Level -->
                <div class="profile-score">
                    <p>Score: <span class="text-blue-500">{{ Auth::user()->score }}</span></p>
                    <p>
                        Level: 
                        @if (Auth::user()->score > 500)
                            <span class="level-badge level-proficient">Proficient</span>
                        @elseif (Auth::user()->score > 300)
                            <span class="level-badge level-advance">Advance</span>
                        @elseif (Auth::user()->score > 0)
                            <span class="level-badge level-basic">Basic</span>
                        @else
                            <span class="level-badge level-none">Belum memiliki skor</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <x-global.footer></x-global.footer>
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>