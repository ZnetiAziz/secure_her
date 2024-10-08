const loginForm = document.getElementById('loginForm');
const signUpForm = document.getElementById('signUpForm');

function showSignUp() {
  loginForm.classList.add('hidden');
  signUpForm.classList.remove('hidden');
}

function showLogin() {
  signUpForm.classList.add('hidden');
  loginForm.classList.remove('hidden');
}
// Show the "Forgot Password" modal
function openForgotPasswordModal() {
    document.getElementById('forgotPasswordModal').style.display = 'block';
  }
  
  // Close the "Forgot Password" modal
  function closeForgotPasswordModal() {
    document.getElementById('forgotPasswordModal').style.display = 'none';
    document.getElementById('resetEmail').value = ''; // Clear the email input
    document.getElementById('confirmationMessage').classList.add('hidden'); // Hide the confirmation message
  }
  
  // Simulate sending a verification code
  function sendVerificationCode() {
    const email = document.getElementById('resetEmail').value;
    const confirmationMessage = document.getElementById('confirmationMessage');
  
    if (email) {
      // Simulate sending an email (in a real application, you'd handle this with a backend)
      confirmationMessage.textContent = `A verification code has been sent to ${email}. Please check your inbox.`;
      confirmationMessage.classList.remove('hidden');
      document.getElementById('resetEmail').value = ''; // Clear the input after sending
    } else {
      confirmationMessage.textContent = 'Please enter a valid email address.';
      confirmationMessage.classList.remove('hidden');
    }
  }
  function validateSignUp() {
    const password = document.getElementById('signUpPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
  
    if (password !== confirmPassword) {
      alert("Passwords do not match! Please try again.");
      return false; // Prevent form submission
    }
    // Add additional validation logic if necessary
    return true; // Allow form submission if valid
  }