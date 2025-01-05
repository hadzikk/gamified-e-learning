const enrollment = document.getElementById('enrollment');
const popupEnrollment = document.getElementById('popupEnrollment');
const closePopupEnrollment = document.getElementById('closePopupEnrollment');

enrollment.addEventListener('click', () => {
    popupEnrollment.classList.remove('--hide');
    popupEnrollment.classList.add('--appear');
});

closePopupEnrollment.addEventListener('click', () => {
    popupEnrollment.classList.remove('--appear');
    popupEnrollment.classList.add('--hide');
});