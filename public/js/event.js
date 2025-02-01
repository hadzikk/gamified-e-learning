document.addEventListener('DOMContentLoaded', () => {
  console.log('Page loaded');

  // Handle enrollment popup logic
  function handleEnrollmentPopup() {
      const enrollment = document.getElementById('enrollment');
      const popupEnrollment = document.getElementById('popupEnrollment');
      const closePopupEnrollment = document.getElementById('closePopupEnrollment');

      if (enrollment && popupEnrollment && closePopupEnrollment) {
          enrollment.addEventListener('click', () => {
              popupEnrollment.classList.toggle('--hide');
              popupEnrollment.classList.toggle('--appear');
          });

          closePopupEnrollment.addEventListener('click', () => {
              popupEnrollment.classList.toggle('--appear');
              popupEnrollment.classList.toggle('--hide');
          });
      } else {
          console.warn('Enrollment popup elements are missing.');
      }
  }

  // Handle login input logic
  function handleLoginInputs() {
      const loginInputs = document.querySelectorAll('.login-textbox-input');
      loginInputs.forEach(input => {
          input.addEventListener('input', () => {
              // No border logic on input
          });

          input.addEventListener('blur', e => {
              const container = e.target.closest('.login-textbox-container');
              if (container) {
                  container.classList.toggle('--border-black', e.target.value.length > 0);
              }
          });
      });
  }

  // Handle popup close for authentication status
  function handleAuthenticationStatusPopup() {
      const closePopupAuthenticationStatus = document.querySelector('.popup-authentication-status .close');
      if (closePopupAuthenticationStatus) {
          closePopupAuthenticationStatus.addEventListener('click', (e) => {
              const popupAuthenticationStatus = e.target.closest('.popup-authentication-status');
              if (popupAuthenticationStatus) {
                  popupAuthenticationStatus.classList.add('--hide');
              }
          });
      } else {
          console.warn('Authentication status close button is not found.');
      }
  }

  // Handle profile picture toggle
  function handleProfilePictureToggle() {
      const profilePicture = document.querySelector('.profile-picture');
      const profileNavigationWrapper = document.querySelector('.profile-navigation-wrapper');

      if (profilePicture && profileNavigationWrapper) {
          profilePicture.addEventListener('click', () => {
              profileNavigationWrapper.classList.toggle('--hide');
              profileNavigationWrapper.classList.toggle('--appear');
          });
      } else {
          console.warn('Profile picture or navigation wrapper is not found.');
      }
  }

  // Handle notification toggle 
  function handleNotificationToggle() {
    const notificationIcon = document.querySelector('.icon-notification');
    const notificationBar = document.querySelector('.notification-bar-wrapper');

    if (notificationIcon && notificationBar) {
        notificationIcon.addEventListener('click', () => {
            notificationBar.classList.toggle('--hide');
            notificationBar.classList.toggle('--appear');
        });
    } else {
        console.warn('Profile picture or navigation wrapper is not found.');
    }
}

  // Handle logout logic
  function handleLogout() {
      const logoutLink = document.getElementById('logout'); // Assuming the 'keluar' link has href="#"
      const logoutForm = document.querySelector('.logout-wrapper form');

      if (logoutLink && logoutForm) {
          logoutLink.addEventListener('click', (event) => {
              event.preventDefault(); // Prevent the default anchor behavior (page reload)

              // Submit the logout form
              logoutForm.submit();
          });
      } else {
          console.warn('Logout link or form not found.');
      }
  }

  // Counter for textarea character limit
  function handleCharacterCounter() {
      const textarea = document.querySelector('.post-textarea');
      const lettersCounter = document.querySelector('.letters-counted');

      if (textarea && lettersCounter) {
          textarea.addEventListener('input', function() {
              const currentLength = textarea.value.length;
              lettersCounter.textContent = `${currentLength} / 230`;
          });
      } else {
          console.warn('Textarea or letters counter element is not found.');
      }
  }

  // Function to add a new question field
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

  // Call functions
  handleLogout();
  handleEnrollmentPopup();
  handleLoginInputs();
  handleAuthenticationStatusPopup();
  handleNotificationToggle()
  handleProfilePictureToggle();
  handleCharacterCounter();
  addQuestionField();
});
