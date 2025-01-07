<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/review.scss') }}">
</head>
<body>
    <div class="review">
        <p class="review-title">{{ $task['title'] }}</p>
        <div class="review-info">
            <div class="review-details-container">
                <div class="review-detail-row">
                    <p class="review-row-title">mata kuliah</p>
                    <p class="review-row-value">{{ $task['subject'] }}</p>
                </div>
                <div class="review-detail-row">
                    <p class="review-row-title">level</p>
                    <p class="review-row-value">{{ $task['level'] }}</p>
                </div>
                <div class="review-detail-row">
                    <p class="review-row-title">dosen</p>
                    <p class="review-row-value">{{ $task['lecturer'] }}</p>
                </div>
                <div class="review-detail-row">
                    <p class="review-row-title">deskripsi</p>
                    <p class="review-row-value --transform-none">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis doloribus, ipsam dignissimos quasi eaque laboriosam repellat omnis ipsa quo incidunt voluptatibus numquam delectus quam dolorum ullam? Ullam nobis facilis natus.</p>
                </div>
                <div class="review-detail-row">
                    <a class="review-row-title" id="enrollment" href="#enrollment">kerjakan kuis&nbsp;<sup class="review-title-icon"><i class="fa-solid fa-arrow-up-right-from-square"></i></sup></a>
                </div>
            </div>
            <div class="review-cover">
                <div class="review-cover-overlay">
                    <div class="review-overlay-content">
                        {{-- <p class="review-overlay-logo">gamified elearning</p>
                        <p class="review-overlay-brandname">Gamified Elearning</p>
                        <p class="review-developers">&copy; Copyright Hadzik Mochamad Sofyan & Muflih Afif Mukhtalif All Rights</p> --}}
                    </div>
                </div>
                <img class="review-picture" src="{{ asset('images/vintage colorful phone wallpaper.jpg') }}" alt="">
            </div>
        </div>
    </div>

    <div class="quiz {{ false ? '--unlocked' : '--locked' }}">
        @foreach ($quizzes as $quiz)
        <div class="quiz-questions-container">
            <p class="quiz-question">{{ $quiz['question'] }}</p>
        </div>
        @if (false)
        <div class="quiz-options-container">
            @for ($i = 0; $i < 4; $i++)
            <div class="quiz-options-wrapper">
                <input class="quiz-option" type="radio" name="" id="">&nbsp;
                <label class="quiz-option-label" for="">Menggunakan struktur data tambahan untuk menyimpan elemen yang diurutkan</label>
            </div>
            @endfor
        </div>
        @endif
        @endforeach
    </div>

    <div class="popup --hide" id="popupEnrollment">
        <div class="popup-content-container">
            <div class="popup-content">
                <div class="popup-content-navigation">
                    <i class="fa-solid fa-xmark" id="closePopupEnrollment"></i>
                </div>
                <div class="popup-content-details">
                    <p class="popup-content-status">kuis belum diambil</p>
                    <p class="popup-content-title">{{ $task['title'] }}</p>
                    <p class="popup-content-lecturer">{{ $task['lecturer'] }}</p>
                    <div class="popup-content-info">
                        <div class="popup-content-level-container">
                            <span class="popup-content-level">{{ $task['level'] }}</span>
                            @if ($task['level'] == 'basic')
                            <i class="fa-regular fa-chess-pawn"></i>
                            @elseif ($task['level'] == 'advance')
                            <i class="fa-regular fa-chess-knight"></i>
                            @else
                            <i class="fa-regular fa-chess-queen"></i>
                            @endif
                        </div>
                    </div>
                    <div class="popup-content-questions-info-container">
                        <div class="popup-content-question-box">
                            <p class="popup-content-question-title">soal</p>
                        </div>
                        <div class="popup-content-question-box">
                            <p class="popup-content-question-value">5</p>
                        </div>
                    </div>
                    <div class="popup-content-quizzes-container">
                        <div class="popup-content-quiz-question-container">
                            @foreach ($quizzes as $quiz)
                                <p class="popup-content-quiz-question">{{ $quiz['question'] }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>