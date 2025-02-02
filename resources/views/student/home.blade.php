<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/student/navbar.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/home.scss') }}">
</head>
<body>
    <x-student.navbar>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-student.navbar>

    <div class="home">
        <div class="profile-card">
            <div class="profile-picture-wrapper">
                <img class="profile-picture" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/wallpaper • car explosion.jpeg') }}" alt="Profile Picture">
            </div>

            <div class="profile-information">
                <div class="profile-level">
                    <span>{{ Auth::user()->level }}</span>
                    @if (Auth::user()->level == "basic")
                        <i class="fa-regular fa-chess-pawn"></i>
                    @elseif (Auth::user()->level == "advance")
                        <i class="fa-regular fa-chess-knight"></i>
                    @else
                        <i class="fa-regular fa-chess-queen"></i>
                    @endif
                </div>
                <p class="profile-fullname">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</p>
                <p class="profile-username">&commat;{{ Auth::user()->username }}</p>
                <p class="profile-score">{{ Auth::user()->score }}</p>
            </div>
        </div>

        <div class="histories">
            <p class="histories-title">riwayat</p>
            <div class="history-logs">
                @foreach($quizUser  as $quiz)
                <div class="history-log">
                    <p style="text-transform: capitalize"><strong>Kuis</strong> {{ $quiz->quiz->post->title }}</p>
                    <p><strong>Status:</strong> {{ $quiz->status }}</p>
                    <p><strong>Durasi:</strong> {{ $quiz->duration }}</p>
                    <p><strong>Waktu Tersisa:</strong> {{ $quiz->time_remaining }}</p>
                    <p><strong>Skor:</strong> {{ $quiz->score }}</p>
                    <p><strong>Waktu Enroll:</strong> {{ $quiz->enrolled_at }}</p>
                    <p><strong>Waktu Selesai:</strong> {{ $quiz->completed_at }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-global.footer></x-global.footer>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>