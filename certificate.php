<?php
session_start();

// Check if the session variables are set, if not redirect back to the quiz page
if (!isset($_SESSION['username']) ) {
    header('Location: quiz.html'); // Redirect if session data is not available
    exit;
}

// Retrieve the username and completion date from the session
$username = htmlspecialchars($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e6afd9;
            font-family: Arial, sans-serif;
        }
        .certificate {
            border: 5px solid #ef9fd2;
            padding: 40px;
            width: 80%;
            text-align: center;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 { 
            font-size: 36px; 
            color: #f484febf; 
        }
        p { 
            font-size: 20px; 
        }
        .name { 
            font-weight: bold; 
            font-size: 26px; 
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
        }
        .logo {
            max-width: 150px; /* Adjust as needed */
            margin-bottom: 20px; /* Space between logo and title */
        }
    </style>
</head>
<body>
    <div class="certificate">
        <img src="logo-removebg-preview.png" alt="Secure Here Logo" class="logo"> <!-- Replace with your logo's path -->
        <h1>Certificate of Completion</h1>
        <p>This certifies that</p>
        <p class="name"><?php echo $username; ?></p> <!-- Display the username -->
        <p>has successfully completed the</p>
        <p><strong>Fundamentals of Digital Security</strong></p>
        
    </div>
</body>
</html>
