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
    <!-- Add the logo in the search container section -->
    <div class="search-container">
        <img src="logo-removebg-preview.png" alt="Logo" class="logo"> <!-- Replace 'logo.png' with your logo file -->
    </div>
  </div>

  <!-- Home Section -->
  <section id="home" class="section fade-in">
    <h1>Welcome to Women Security, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Empowering and securing women globally through education, technology, and support.</p>
  </section>

  <!-- About Us Section -->
  <section id="about" class="section fade-in">
    <div class="block">
      <h2>About Us</h2>
      <p>At Secure Her, we are committed to empowering women to protect their online privacy and security in the face of increasing cyber threats. Our platform offers a comprehensive suite of resources, including educational courses, interactive quizzes, and certifications, to equip women with the knowledge and tools they need to navigate the digital world safely.</p>
    </div>

    <div class="block">
      <h2>Our Vision</h2>
      <p>We envision a digital world where women can engage freely online, without fear of harassment, privacy invasion, or cyberattacks. Our goal is to foster a safe and inclusive internet environment where women are informed, protected, and empowered.</p>
    </div>

    <div class="block">
      <h2>Our Mission</h2>
      <ul>
        <li>Educate women about cybersecurity risks and best practices through accessible online courses.</li>
        <li>Provide interactive tools like quizzes and certificates to enhance learning and encourage active engagement.</li>
        <li>Use AI technology to detect and prevent online harassment, ensuring women feel safe while using digital platforms.</li>
        <li>Build a strong community of women who support each other in their journey toward safer online practices.</li>
      </ul>
    </div>

    <div class="block">
      <h2>Why We Started</h2>
      <p>As cyber threats against women, such as online harassment, cyberstalking, and data breaches, continue to rise, we recognized the urgent need for a dedicated platform to address these issues. Secure Her was created to bridge this gap by providing not only the technical tools but also the educational resources necessary to help women defend their privacy and security in the digital world.</p>
    </div>

    <div class="block">
      <h2>What We Offer</h2>
      <ul>
        <li>Educational Courses: Our platform includes a wide range of cybersecurity courses designed to teach women how to protect their personal data, secure their accounts, and avoid common online threats.</li>
        <li>Videos & Tutorials: We provide engaging video tutorials on cybersecurity topics, making it easier to learn practical skills for online safety.</li>
        <li>Quizzes & Certificates: After completing our courses, users can take quizzes to test their knowledge and earn certifications that demonstrate their expertise in online privacy and security.</li>
        <li>AI Harassment Detection: Secure Her integrates advanced AI technology that detects and flags harassing messages, helping to shield users from cyberbullying, harassment, and other online threats.</li>
      </ul>
    </div>
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
