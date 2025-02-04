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
                    <div class="history-log-header">
                        <div class="history-header-left">
                            <p class="history-quiz-enrolled">Enroll: {{ $quiz->enrolled_at }}</p>
                            <p class="history-quiz-title">{{ $quiz->quiz->post->title }}</p>
                            <div class="history-level-wrapper">
                                <span class="history-quiz-level">{{ $quiz->quiz->post->level }}</span>
                                @if ($quiz->quiz->post->level == 'basic')
                                <i class="fa-regular fa-chess-pawn"></i>
                                @elseif ($quiz->quiz->post->level == 'advance')
                                <i class="fa-regular fa-chess-knight"></i>
                                @else
                                <i class="fa-regular fa-chess-queen"></i>
                                @endif
                            </div>
                        </div>
                        <div class="history-header-right">
                            <p class="history-status">{{ $quiz->status }}</p>
                            <p class="history-time-completed">{{ $quiz->completed_at }}</p>
                        </div>
                    </div>
                    <br>
                    <div class="history-log-footer">
                        <div class="history-footer-left">
                            <p class="history-duration">Durasi yang diberikan dosen: {{ \Carbon\CarbonInterval::seconds($quiz->duration)->cascade()->forHumans() }}</p>
                            <p class="history-time-remaining">Durasi pengerjaan: {{ \Carbon\CarbonInterval::seconds($quiz->time_remaining)->cascade()->forHumans() }}</p>
                        </div>
                        <div class="history-footer-right">
                            <br>
                            <p class="history-score">Skor: {{ $quiz->score }}/100</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-global.footer></x-global.footer>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>