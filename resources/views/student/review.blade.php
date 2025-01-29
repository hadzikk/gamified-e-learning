<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/student/review.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
</head>
<body>
    <div class="review">
        <a class="link-back" href="/student/post"><i class="fa-solid fa-arrow-left-long"></i></a>
        <p class="review-title">{{ $post['title'] }}</p>
        <div class="review-info">
            <div class="review-details-container">
                <div class="review-detail-row">
                    <p class="review-row-title">mata kuliah</p>
                    <p class="review-row-value">{{ $post['subject'] }}</p>
                </div>
                <div class="review-detail-row">
                    <p class="review-row-title">level</p>
                    <p class="review-row-value">{{ $post['level'] }}</p>
                </div>
                <div class="review-detail-row">
                    <p class="review-row-title">dosen</p>
                    <p class="review-row-value">{{ $post->user->first_name }} {{ $post->user->last_name }} <span style="text-transform: capitalize;">{{ $post->user->degree }}</p>
                </div>
                <div class="review-detail-row">
                    <p class="review-row-title">deskripsi</p>
                    <p class="review-row-value --transform-none">{{ $post->description }}</p>
                </div>
                @foreach ($quiz as $quizItem)
    @php
        // Cek apakah user sudah terdaftar dan status kuis
        $quizUser = $quizItem->users->where('id', Auth::id())->first();
    @endphp

    @if ($quizUser && $quizUser->pivot->status == 'completed')
        <!-- Jika kuis sudah selesai, tampilkan "Kuis sudah dikerjakan" dengan ikon centang -->
        <div class="review-detail-row --appear">
            <p class="review-row-title quiz">
                Kuis ini sudah dikerjakan&nbsp;<sup class="review-title-icon"><i class="fa-solid fa-check"></i></sup>
            </p>
        </div>
    @else
        <!-- Jika kuis belum selesai, tampilkan "Kerjakan kuis" -->
        <div class="review-detail-row {{ in_array($quizItem->id, $enrolledQuizIds) ? '--hide' : '--appear' }}">
            <a class="review-row-title quiz" id="enrollment" href="#enrollment">
                Kerjakan kuis&nbsp;<sup class="review-title-icon"><i class="fa-solid fa-arrow-up-right-from-square"></i></sup>
            </a>
        </div>
    @endif
@endforeach

                @foreach ($quiz as $quizItem)
                @php
                    // Cek apakah user sudah terdaftar dan status kuis
                    $quizUser = $quizItem->users->where('id', Auth::id())->first();
                @endphp

                <span class="review-row-penalty {{ 
                        in_array($quizItem->id, $enrolledQuizIds) && (!$quizUser || $quizUser->pivot->status != 'completed') 
                        ? '--appear' : '--hide' 
                    }}">penalty akan diterapkan dalam</span>&nbsp;

                <span class="review-row-duration 
                    {{ 
                        in_array($quizItem->id, $enrolledQuizIds) && (!$quizUser || $quizUser->pivot->status != 'completed') 
                        ? '--appear' : '--hide' 
                    }}">
                    <!-- Durasi akan muncul jika kuis belum selesai -->
                </span>
            @endforeach

            </div>
            <div class="review-cover">
                <img class="review-picture" src="{{ asset('images/vintage colorful phone wallpaper.jpg') }}" alt="">
            </div>
        </div>
    </div>

    <div class="quiz-container">
        @foreach ($quiz as $quizItem)
            @php
                // Cek apakah user sudah terdaftar dan mendapatkan status untuk kuis ini
                $quizUser = $quizItem->users->where('pivot.user_id', Auth::id())->first();
            @endphp
    
            <div class="quiz {{ $quizUser && $quizUser->pivot->status == 'completed' ? '--hide' : (in_array($quizItem->id, $enrolledQuizIds) ? '--unlocked' : '--locked') }}">
                @if ($quizUser && $quizUser->pivot->status == 'completed')
                    <!-- Kuis telah selesai, beri class --hide supaya tersembunyi -->
                    @continue
                @endif
    
                @if (in_array($quizItem->id, $enrolledQuizIds))
                    <p class="quiz-title">{{ $quizItem->title }}</p>
                    <form class="form-quiz" action="{{ route('quizzes.submit', $quizItem->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="slug" value="{{ $post->slug }}">
                        <input type="hidden" name="level" value="{{ $post->level }}">
                        @foreach ($quizItem->questions as $question)
                            <div class="quiz-questions-container">
                                <p class="quiz-question">{{ $question->question_text }}</p>
                            </div>
    
                            <div class="quiz-options-container">
                                @foreach ($question->options as $option)
                                    <div class="quiz-options-wrapper">
                                        <input class="quiz-option" type="radio" name="question_{{ $question->id }}" value="{{ $option->id }}" id="option_{{ $option->id }}">
                                        <label class="quiz-option-label" for="option_{{ $option->id }}">{{ $option->option_text }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <button type="submit" class="quiz-submit">Submit Jawaban</button>
                    </form>
                @else
                    <p class="quiz-message">Anda belum mendaftar ke kuis ini.</p>
                @endif
            </div>
        @endforeach
    </div>
            

    <div class="popup --hide" id="popupEnrollment">
        <div class="popup-content-container">
            <div class="popup-content">
                <div class="popup-content-navigation">
                    <p></p>
                    <i class="fa-solid fa-xmark" id="closePopupEnrollment"></i>
                </div>
                <div class="popup-content-details">
                    <p class="popup-content-title">{{ $post['title'] }}</p>
                    <div class="popup-content-author">
                        <span class="popup-content-lecturer">{{ $post->user->first_name." ".$post->user->last_name }}</span>&nbsp;
                        <span class="popup-content-degree">{{ $post->user->degree }}</span>
                    </div>
                    @foreach ($quiz as $quizItem)
                    {{-- <p class="popup-content-deadline">waktu pengerjaan {{ $quizItem->duration }}</p> --}}
                    @endforeach
                    <div class="popup-content-info">
                        <div class="popup-enrollment-container">
                            @foreach ($quiz as $quizItem)
                                <form class="form-enroll" action="{{ route('quizzes.enroll', $quizItem->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="time_given" value="{{ $quizItem->duration }}">
                                    <button type="submit" class="button-enroll">Enroll kuis</button>
                                </form>
                            @endforeach
                        </div>                        
                    </div>
                    <div class="popup-questions">
                        <div class="popup-quizzes-container">
                            <div class="popup-content-quizzes-container">
                                @foreach ($quiz as $quizItem)
                                    @foreach ($quizItem->questions as $question)
                                    <div class="popup-content-quiz-question-container">
                                        <p class="popup-content-quiz-question">{{ $question->question_text }}</p>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-global.footer></x-global.footer>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const enrollForms = document.querySelectorAll(".form-enroll");

    enrollForms.forEach(form => {
        form.addEventListener("submit", function (event) {
            // Tidak ada preventDefault di sini agar form bisa disubmit

            const timeGiven = parseInt(this.querySelector("input[name='time_given']").value); // waktu yang diberikan dalam menit
            const startTime = Date.now();
            const endTime = startTime + timeGiven * 60 * 1000; // Mengonversi menit ke milidetik

            // Simpan waktu di localStorage
            localStorage.setItem("quizStartTime", startTime);
            localStorage.setItem("quizEndTime", endTime);
            localStorage.setItem("quizDuration", timeGiven * 60); // Menyimpan durasi dalam detik (bukan menit)

            // Set timer untuk form submission
            startTimer(form);
        });
    });

    function startTimer(form) {
        const durationElement = document.querySelector(".review-row-duration");
        if (!durationElement) return;

        const endTime = parseInt(localStorage.getItem("quizEndTime"));
        const interval = setInterval(() => {
            const now = Date.now();
            const timeRemaining = Math.max(0, Math.floor((endTime - now) / 1000)); // Menghitung waktu tersisa dalam detik

            durationElement.textContent = formatTime(timeRemaining);

            // Update nilai time_remaining pada form
            const timeRemainingInput = form.querySelector("input[name='time_remaining']");
            timeRemainingInput.value = timeRemaining;

            if (timeRemaining <= 0) {
                clearInterval(interval);
                durationElement.textContent = "Waktu habis!";
            }
        }, 1000);
    }

    function formatTime(seconds) {
        const hours = Math.floor(seconds / 3600); // Menghitung jam
        const minutes = Math.floor((seconds % 3600) / 60); // Menghitung menit
        const secs = seconds % 60; // Menghitung detik

        // Format jam:menit:detik, dengan menambahkan 0 di depan menit dan detik yang kurang dari 10
        return `${hours}:${minutes < 10 ? '0' : ''}${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }

    // Cek apakah ada timer aktif saat halaman dimuat
    if (localStorage.getItem("quizEndTime")) {
        startTimer();
    }
});

</script>        
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>
