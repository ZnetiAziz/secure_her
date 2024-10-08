
// Function to handle navbar toggle for mobile view
function toggleNavbar() {
    const navbar = document.getElementById('navbar');
    navbar.classList.toggle('active');
  }
  
  // Function to show a section based on button clicks
  function showSection(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        if (section.id === sectionId) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    });
  }
  
  // Function to handle form submission for comments
  function submitComment() {
    const commentInput = document.getElementById('commentInput');
    const commentDisplay = document.getElementById('commentDisplay');
    
    if (commentInput.value) {
        const newComment = document.createElement('p');
        newComment.textContent = commentInput.value;
        commentDisplay.appendChild(newComment);
        commentInput.value = ''; // Clear the input after submission
    } else {
        alert('Please enter a comment before submitting.');
    }
  }
  
  // Initialize event listeners for buttons
  function init() {
    const commentButton = document.getElementById('commentButton'); // Select the submit button
    const homeButton = document.getElementById('homeButton');
    const educativeButton = document.getElementById('educativeButton');
    const applicationButton = document.getElementById('applicationButton');
    const commentPageButton = document.getElementById('commentPageButton');
  
    if (commentButton) {
        commentButton.addEventListener('click', submitComment); // Attach the submitComment function
    }
    
    // Add event listeners to buttons to show respective sections
    if (homeButton) {
        homeButton.addEventListener('click', () => showSection('homeSection'));
    }
    
    if (educativeButton) {
        educativeButton.addEventListener('click', () => showSection('educativeSection'));
    }
    
    if (applicationButton) {
        applicationButton.addEventListener('click', () => showSection('applicationSection'));
    }
    
    if (commentPageButton) {
        commentPageButton.addEventListener('click', () => showSection('commentSection'));
    }
  }
  
  // Call the init function when the DOM is fully loaded
  document.addEventListener('DOMContentLoaded', init);
  