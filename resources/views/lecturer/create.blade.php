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
        <a class="link-back" href="/lecturer/dashboard"><i class="fa-solid fa-arrow-left-long"></i></a>
        <form action="/lecturer/dashboard/create" method="post">
        @csrf
        <p class="title">membuat postingan kuis</p>
        <div class="post-create-container">
            <div class="post-create-box">
                <div class="post-input-items">
                <p class="post-input-title">topik</p>
                <div class="post-input-textbox">
                    <input class="post-input" type="text" name="subject" placeholder="Masukkan topik, subjek atau mata kuliah..." required>
                </div>
            </div>

            <div class="post-input-items">
                <p class="post-input-title">judul</p>
                <div class="post-input-textbox">
                    <input class="post-input" type="text" name="title" placeholder="Masukkan judul..." required>
                </div>
            </div>
            
            <div class="post-input-items">
                <p class="post-input-title">level</p>
                <div class="post-input-textbox --border-none">
                    <select class="post-select" name="level" id="" required>
                        <option class="post-option" value="basic">basic</option>
                        <option class="post-option" value="advance">advance</option>
                        <option class="post-option" value="proficient">proficient</option>
                    </select>
                </div>
            </div>
            
            <div class="post-input-items">
                <p class="post-input-title">deskripsi</p>
                <div class="post-input-textbox">
                    <textarea class="post-textarea" name="description" id="" cols="30" rows="10" maxlength="230" placeholder="Masukkan deskripsi..."></textarea>
                    <div class="letters-counter">
                        <p class="letters-counted">0 / 230</p>
                    </div>
                </div>
            </div>

            <div class="post-input-items">
                <p class="post-input-title">durasi</p>
                <div class="post-input-textbox">
                    <input class="post-input" name="duration" type="number" placeholder="Masukkan durasi pengerjaan..." required>
                </div>
            </div>

            <div class="post-input-items">
                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
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

    <script>
    function addQuestionField() {
    const addQuestionButton = document.querySelector('.button-add-question');
    const quizContainer = document.querySelector('.quiz-items-container');
    let questionIndex = 0; // Mulai dari 0 untuk indeks pertanyaan

    addQuestionButton.addEventListener('click', () => {
        // Buat elemen pertanyaan baru
        const newQuestionContainer = document.createElement('div');
        newQuestionContainer.classList.add('question-content-container');

        newQuestionContainer.innerHTML = `
            <div class="quiz-content">
                <div class="quiz-question">
                    <input class="quiz-input" name="questions[${questionIndex}][question_text]" type="text" placeholder="Masukkan pertanyaan" required>&nbsp;
                    <i class="fa-solid fa-xmark remove-question"></i>
                </div>
                <div class="button-add-option">
                    <p class="add-option-title"><i class="fa-solid fa-plus"></i>&nbsp;tambah opsi</p>
                </div>
            </div>
        `;

        // Tambahkan elemen pertanyaan ke dalam kontainer kuis
        quizContainer.insertBefore(newQuestionContainer, addQuestionButton);

        // Event listener untuk menghapus pertanyaan
        const removeQuestionButton = newQuestionContainer.querySelector('.remove-question');
        removeQuestionButton.addEventListener('click', () => {
            newQuestionContainer.remove();
        });

        // Tambahkan event listener untuk tombol tambah opsi
        const addOptionButton = newQuestionContainer.querySelector('.button-add-option');
        addOptionButton.addEventListener('click', () => {
            addOptionField(newQuestionContainer, questionIndex);
        });

        // Increment index untuk pertanyaan berikutnya
        questionIndex++;
    });
}

// Fungsi untuk menambahkan opsi ke pertanyaan tertentu
function addOptionField(questionElement, questionIndex) {
    const quizContentContainer = questionElement.querySelector('.quiz-content');
    let optionIndex = quizContentContainer.querySelectorAll('.quiz-option').length;

    if (optionIndex < 5) { // Maksimal 5 opsi per pertanyaan
        const newOptionItem = document.createElement('div');
        newOptionItem.classList.add('quiz-option');

        newOptionItem.innerHTML = `
            <input class="quiz-radio" type="radio" name="options[${questionIndex}][is_correct]" value="${optionIndex}" required>&nbsp;
            <input class="quiz-radio-label" name="options[${questionIndex}][option_text][]" type="text" placeholder="Masukkan Opsi" required>
            <i class="fa-solid fa-xmark remove-option"></i>
        `;

        // Tambahkan elemen opsi ke dalam kontainer
        quizContentContainer.insertBefore(newOptionItem, quizContentContainer.querySelector('.button-add-option'));

        // Event listener untuk menghapus opsi
        const removeButton = newOptionItem.querySelector('.remove-option');
        removeButton.addEventListener('click', () => {
            newOptionItem.remove();
        });
    } else {
        alert('Maksimal 5 opsi per pertanyaan.');
    }
}
addQuestionField();
    </script>

    {{-- <script src="{{ asset('js/event.js') }}"></script> --}}
</body>
</html>