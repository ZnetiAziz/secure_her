<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit;
}
$username = $_SESSION['username']; // Get the username from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Women Security - Home</title>
  <link rel="stylesheet" href="accueil.css">
</head>
<body>
  <!-- Navigation Bar -->
  <div class="navbar">
    <ul>
      <li><a href="accueil.php" class="nav-btn">Home</a></li>
      <li><a href="education.html" class="nav-btn">Education</a></li>
      <li><a href="application.php" class="nav-btn">Application</a></li>
      <li><a href="communication.php" class="nav-btn">Communication</a></li>
     
    </ul>
    <div class="search-container">
      <input type="text" placeholder="Search..." class="search-box" />
      <button class="search-btn">🔍</button>
    </div>
  </div>

  <!-- Home Section -->
  <section id="home" class="section fade-in">
    <h1>Welcome to Women Security, <?php echo htmlspecialchars($username); ?>!</h1> <!-- Display username here -->
    <p>Empowering and securing women globally through education, technology, and support.</p>
    <button class="cta-btn" onclick="location.href='educative.html'">Learn More</button>
  </section>

  <!-- Contact Us Section -->
  <section id="educative" class="section fade-in" style="background-image: url('background2.jpg');">
    <div class="contact-container">
        <h3>Contact Us</h3>
        <p>If you have any questions or feedback, feel free to reach out!</p>
        <a href="mailto:your-email@example.com" class="contact-btn">Gmail</a>
        <a href="https://www.facebook.com" target="_blank" class="contact-btn">Facebook</a>
        <a href="https://www.linkedin.com" target="_blank" class="contact-btn">LinkedIn</a>
        <a href="https://github.com" target="_blank" class="contact-btn">GitHub</a>
    </div>
  </section>

  <script src="script.js"></script>
</body>
</html>
