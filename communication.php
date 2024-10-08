<?php
session_start();
include 'db.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username']; // Get logged-in user's username

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    if (!empty($comment)) {
        // Insert the comment into the database
        $stmt = $conn->prepare("INSERT INTO comments (user_id, comment) VALUES (:user_id, :comment)");
        $stmt->execute(['user_id' => $user_id, 'comment' => $comment]);
    }
}

// Fetch all comments from the database
$stmt = $conn->prepare("SELECT comments.comment, users.id AS user_id, comments.created_at 
                        FROM comments 
                        JOIN users ON comments.user_id = users.id 
                        ORDER BY comments.created_at DESC");
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Women Security - Comments</title>
  <link rel="stylesheet" href="accueil.css">
</head>
<body>
  <!-- Navigation Bar -->
  <nav id="navbar" class="navbar">
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
  </nav>

  <!-- Comments Section -->
  <section id="commentaire" class="section fade-in">
    <h2>Comments and Feedback</h2>
    <p>We value your feedback! Please leave your thoughts and suggestions below:</p>
    
    <!-- Comment Form -->
    <form action="" method="POST">
      <textarea name="comment" placeholder="Enter your comment here"></textarea>
      <button class="cta-btn" type="submit">Submit Comment</button>
    </form>

    <!-- Display Comments -->
    <div class="comments-section">
      <?php if ($comments): ?>
        <?php foreach ($comments as $comment): ?>
          <div class="comment">
            <strong><?php echo "User " . htmlspecialchars($comment['user_id']); ?></strong>
            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
            <small>Posted on <?php echo htmlspecialchars($comment['created_at']); ?></small>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No comments yet. Be the first to comment!</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Contact Us Section -->
 
  <script src="script.js"></script>
</body>
</html>
