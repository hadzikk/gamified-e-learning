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
                    }}"></span>&nbsp;

                <span class="review-row-duration 
                    {{ 
                        in_array($quizItem->id, $enrolledQuizIds) && (!$quizUser || $quizUser->pivot->status != 'completed') 
                        ? '--appear' : '--hide' 
                    }}" data-duration="{{ $quizItem->duration }}">
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
                        <input class="time-remaining" type="hidden" name="time_remaining">
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
                    @endforeach
                    <div class="popup-content-info">
                        <div class="popup-enrollment-container">
                            @foreach ($quiz as $quizItem)
                                <form class="form-enroll" action="{{ route('quizzes.enroll', $quizItem->id) }}" method="POST">
                                    @csrf
                                    <input class="quiz-duration" type="hidden" name="duration" value="{{ $quizItem->duration }}">
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
            const enrollForms = document.querySelectorAll(".form-quiz");
            const durationElement = document.querySelector(".review-row-duration");
            
            function startTimer(duration) {
                const now = Date.now();
                let endTime = parseInt(localStorage.getItem("quizEndTime")) || now + duration * 1000; // Jika sudah ada timer, pakai yang lama
        
                localStorage.setItem("quizEndTime", endTime); // Simpan waktu akhir
        
                function updateTimer() {
                    const currentTime = Date.now();
                    const timeRemainingMillis = endTime - currentTime;
                    const timeRemaining = Math.max(0, Math.floor(timeRemainingMillis / 1000));
        
                    if (durationElement) {
                        durationElement.textContent = formatTime(timeRemaining);
                    }
        
                    if (timeRemaining <= 0) {
                        clearInterval(window.timerInterval);
                        durationElement.textContent = "Waktu habis!";
                        localStorage.removeItem("quizEndTime");
                    }
                }
        
                updateTimer(); // Jalankan pertama kali
                window.timerInterval = setInterval(updateTimer, 1000);
            }
        
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = seconds % 60;
                return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
            }
        
            // **Event Listener Submit Form Quiz**
            enrollForms.forEach(form => {
                form.addEventListener("submit", function (event) {
                    clearInterval(window.timerInterval); // Hentikan timer saat submit
        
                    const timeRemainingMillis = parseInt(localStorage.getItem("quizEndTime")) - Date.now();
                    const timeRemainingSeconds = Math.max(0, Math.floor(timeRemainingMillis / 1000));
        
                    // Masukkan nilai waktu tersisa ke input hidden
                    const timeRemainingInput = form.querySelector(".time-remaining");
                    if (timeRemainingInput) {
                        timeRemainingInput.value = timeRemainingSeconds;
                    }
        
                    localStorage.removeItem("quizEndTime"); // Hapus data timer setelah submit
                });
            });
        
            // **Cek apakah timer sudah ada**
            if (localStorage.getItem("quizEndTime")) {
                startTimer(0); // Lanjutkan timer yang ada
            } else {
                // Jika belum ada timer, ambil durasi dari elemen di halaman
                if (durationElement && durationElement.dataset.duration) {
                    const quizDuration = parseInt(durationElement.dataset.duration);
                    if (!isNaN(quizDuration)) {
                        startTimer(quizDuration);
                    }
                }
            }
        });
        </script>
        

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>
