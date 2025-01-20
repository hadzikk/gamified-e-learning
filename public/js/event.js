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

    // Handle logout logic
    function handleLogout() {
        const logoutLink = document.querySelector('.profile-navigation-list a[href="#"]'); // Assuming the 'keluar' link has href="#"
        const logoutForm = document.querySelector('.profile-navigation-wrapper form');

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
  
    // Call functions
    handleLogout();
    handleEnrollmentPopup();
    handleLoginInputs();
    handleAuthenticationStatusPopup();
    handleProfilePictureToggle();
});
  