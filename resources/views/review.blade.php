<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/review.scss') }}">
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>
    <div class="review">
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
                    <p style="text-transform: capitalize" class="review-row-value">{{ $post->user->first_name }} {{ $post->user->last_name }} <span style="text-transform: capitalize;">{{ $post->user->degree }}</p>
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
        @if (false)
        @foreach ($questions as $question)
        <div class="quiz-questions-container">
            <p class="quiz-question">{{ $question['question_text'] }}</p>
        </div>
        @if (false)
        <div class="quiz-options-container">
            @foreach ($options as $option)
            <div class="quiz-options-wrapper">
                <input class="quiz-option" type="radio" name="" id="">&nbsp;
                <label class="quiz-option-label" for="">{{ $option['option_text'] }}</label>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach
        @else
            <p class="quiz-question">Soal kuiz akan muncul disini ketika telah mendaftar kuis.</p>
        @endif
    </div>

    <div class="popup --hide" id="popupEnrollment">
        <div class="popup-content-container">
            <div class="popup-content">
                <div class="popup-content-navigation">
                    <span class="popup-content-status">kuis belum diambil</span>
                    <i class="fa-solid fa-xmark" id="closePopupEnrollment"></i>
                </div>
                <div class="popup-content-details">
                    <p class="popup-content-title">{{ $post['title'] }}</p>
                    <p style="text-transform: capitalize;" class="popup-content-lecturer">{{ $post->user->first_name }} {{ $post->user->last_name }} <span style="text-transform: capitalize;">{{ $post->user->degree }}</p>
                    <div class="popup-content-info">
                        <div class="popup-content-level-container">
                            {{-- <span class="popup-content-level">{{ $post['level'] }}</span>
                            @if ($post['level'] == 'basic')
                            <i class="fa-regular fa-chess-pawn"></i>
                            @elseif ($post['level'] == 'advance')
                            <i class="fa-regular fa-chess-knight"></i>
                            @else
                            <i class="fa-regular fa-chess-queen"></i>
                            @endif --}}
                            <a class="popup-content-link" href="">ambil kuis ini</a>
                        </div>
                    </div>
                    <div class="popup-questions">
                        <div class="popup-quizzes-container">
                            <div class="popup-content-quizzes-container">
                                @foreach ($questions as $question)
                                <div class="popup-content-quiz-question-container">
                                    <p class="popup-content-quiz-question">{{ $question['question_text'] }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>