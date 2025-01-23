<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create</title>
        <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lecturer/create.scss') }}">
        <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
    </head>
    <body>
        <a class="link-back" href="{{ url()->previous() }}"><i class="fa-solid fa-arrow-left-long"></i></a>
        <form action="/lecturer/dashboard/create" method="post">
        @csrf
        <p class="title">membuat postingan kuis</p>
        <div class="post-create-container">
            <div class="post-create-box">
                <div class="post-input-items">
                <p class="post-input-title">topik</p>
                <div class="post-input-textbox">
                    <input class="post-input" type="text" name="subject" placeholder="Masukkan topik, subjek atau mata kuliah...">
                </div>
            </div>

            <div class="post-input-items">
                <p class="post-input-title">judul</p>
                <div class="post-input-textbox">
                    <input class="post-input" type="text" name="title" placeholder="Masukkan judul...">
                </div>
            </div>
            
            <div class="post-input-items">
                <p class="post-input-title">level</p>
                <div class="post-input-textbox --border-none">
                    <select class="post-select" name="level" id="">
                        <option class="post-option" value="basic">basic</option>
                        <option class="post-option" value="advance">advance</option>
                        <option class="post-option" value="proficient">proficient</option>
                    </select>
                </div>
            </div>
            
            <div class="post-input-items">
                <p class="post-input-title">Deskripsi</p>
                <div class="post-input-textbox">
                    <textarea class="post-textarea" name="description" id="" cols="30" rows="10" maxlength="230" placeholder="Masukkan deskripsi..."></textarea>
                    <div class="letters-counter">
                        <p class="letters-counted">0 / 230</p>
                    </div>
                </div>
            </div>
            <div class="post-input-items">
                <p class="post-input-title">tenggat waktu</p>
                <input class="post-datetime-local" name="deadline" type="datetime-local">
            </div>

            <div class="post-input-items">
                <button class="button-submit" type="submit">selesai dan posting</button>
            </div>

        </div>
        <div class="post-create-box">
                <p class="quiz-title">kuis</p>
                <div class="quiz-items-container">
                    <div class="button-add-question">
                        <p class="add-question-title"><i class="fa-solid fa-pencil"></i>&nbsp;tambah pertanyaan</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <x-global.footer></x-global.footer>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>