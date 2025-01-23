<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/components/global/navbar.scss') }}">
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/welcome.scss') }}">
</head>
<body>
    <x-global.navbar></x-global.navbar>
    <div class="hero-section">
        <p class="hero-title">hi, selamat datang</p>
    </div>
    <div class="levels-container">
        <p class="level-text">Mulai dari Basic, Taklukkan Advance, dan Jadilah Proficient!</p>
        <div class="level-additional-information" id="faq">
            <p class="level-additional-title">skor dan level</p>
            <p class="level-additional-description">Setiap kuis yang Anda kerjakan akan memberikan skor dengan total nilai maksimal 100. Nilai yang Anda peroleh dari setiap kuis akan diakumulasikan untuk meningkatkan skor keseluruhan Anda. Sistem ini dirancang untuk memberikan tantangan yang adil dengan mekanisme penalty poin. Pada level Basic, penalty sebesar 30% akan diterapkan jika jawaban salah. Namun, semakin tinggi level Anda—seperti di level Advance dan Proficient—penalty poin akan semakin kecil, memberikan kesempatan lebih besar untuk mempertahankan skor Anda. Naikkan level dengan mengumpulkan skor dari kuis, taklukkan tantangan di setiap tahap, dan buktikan kemampuan Anda untuk mencapai puncak keahlian di level Proficient!</p>
        </div>
        
        <div class="level-additional-information">
            <p class="level-additional-title">tingkat kesulitan</p>
            <p class="level-additional-description">Setiap level dalam sistem ini dirancang dengan tingkat kesulitan yang disesuaikan berdasarkan topik, pengetahuan yang membutuhkan pemahaman lebih mendalam dan soal kuis yang diberikan. Tingkat kesulitan ini dibuat oleh pembuat kuis untuk memastikan bahwa setiap pertanyaan relevan dan menantang sesuai dengan level Anda. Namun, kami memahami bahwa tingkat kesulitan dapat bersifat subjektif bagi setiap individu. Oleh karena itu, kami menetapkan konvensi yang jelas: pada level Basic, setiap kuis memiliki 3 opsi jawaban untuk memberikan kemudahan bagi pemula. Seiring Anda naik ke level Advance dan Proficient, jumlah opsi meningkat hingga 5 pilihan, mencerminkan tantangan yang lebih kompleks dan mendalam. Dengan konvensi ini, kami memastikan pengalaman belajar yang terstruktur dan progresif, sambil tetap memberikan tantangan yang sesuai untuk setiap tingkat keahlian.</p>
        </div>
        <div class="level-cards" id="levels">
            <div class="level-card">
                <img src="{{ asset('images/efb396e2-e898-448e-a18d-e4fec6cc4c97.jpg') }}" alt="" class="level-cover">
                <p class="level-title">basic</p>
                <div class="level-icon-container">
                    <i class="fa-regular fa-chess-pawn icon"></i>
                </div>
            </div>
            <div class="level-card">
                <img src="{{ asset('images/ec9b92f3-6100-471d-8d8c-42e2ccd004e0.jpg') }}" alt="" class="level-cover">
                <p class="level-title">advance</p>
                <div class="level-icon-container">
                    <i class="fa-regular fa-chess-knight icon"></i>
                </div>
            </div>
            <div class="level-card">
                <img src="{{ asset('images/92a2b3f3-e630-4d0a-9af0-9ac8bd51c199.jpg') }}" alt="" class="level-cover">
                <p class="level-title">proficient</p>
                <div class="level-icon-container">
                    <i class="fa-regular fa-chess-queen icon"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="get-started">
        <div class="get-started-box">
            <p class="get-started-description">Seberapa Jauh Kamu Tahu? Temukan Jawabannya di Sini!</p>
            <div class="get-started-container">
                <div class="get-started-button">
                    <a class="get-started-link" href="/oa/account-security/login">mulai sekarang!</a>
                </div>
            </div>
            <p class="get-started-text">gamified e-learning</p>
        </div>
    </div>
</body>
</html>