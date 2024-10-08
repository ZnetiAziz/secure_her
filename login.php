<?php
// Include the database connection
include 'db.php';

session_start();
$message = '';

// Handle Sign-Up
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() > 0) {
        $message = 'User already exists with this email!';
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, email, phone, pwd) VALUES (:username, :email, :phone, :pwd)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'pwd' => $password
        ]);
        $message = 'Sign up successful! Please log in.';
    }
}

// Handle Login



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['pwd'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username']; // Store the username in session
        header('Location: accueil.php'); // Redirect to the homepage after login
        exit;
    } else {
        echo 'Invalid username or password';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Sign Up</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <h1 class="title">Women Security</h1>

    <!-- Display Messages -->
    <?php if ($message): ?>
      <p><?php echo $message; ?></p>
    <?php endif; ?>

    <div class="form-container" id="loginForm">
      <h2>Login</h2>
      <form method="post">
        <div class="input-group">
          <label for="loginUsername">Username</label>
          <input type="text" name="username" id="loginUsername" required>
        </div>
        <div class="input-group">
          <label for="loginPassword">Password</label>
          <input type="password" name="password" id="loginPassword" required>
        </div>
        <button type="submit" name="login" class="btn neon-btn">Login</button>
        <p class="toggle" onclick="showSignUp()">Don't have an account? Sign up</p>
      </form>
    </div>

    <div class="form-container hidden" id="signUpForm">
      <h2>Sign Up</h2>
      <form method="post">
        <div class="input-group">
          <label for="signUpUsername">Username</label>
          <input type="text" name="username" id="signUpUsername" required>
        </div>
        <div class="input-group">
          <label for="signUpEmail">Email</label>
          <input type="email" name="email" id="signUpEmail" required>
        </div>
        <div class="input-group">
          <label for="signUpPhone">Phone</label>
          <input type="text" name="phone" id="signUpPhone" required>
        </div>
        <div class="input-group">
          <label for="signUpPassword">Password</label>
          <input type="password" name="password" id="signUpPassword" required>
        </div>
        <button type="submit" name="signup" class="btn neon-btn">Sign Up</button>
        <p class="toggle" onclick="showLogin()">Already have an account? Login</p>
      </form>
    </div>
  </div>

  <script src="login.js"></script>
</body>
</html>
