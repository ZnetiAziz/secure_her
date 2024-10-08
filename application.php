<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Women Security - Application</title>
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

  <!-- Application Section -->
  <section id="application" class="section fade-in">
    <h2>Our Application</h2>
    <p>Discover how our application provides real-time safety features, emergency alerts, and guidance to keep you safe.</p>
    
    
    <!-- Form for POST request -->
    <form id="huggingfaceForm">
      <textarea id="inputText" placeholder="Enter your text here..."></textarea>
      <button type="submit">Submit to Hugging Face</button>
    </form>
    <div id="responseContainer"></div>
  </section>

  <script>
    document.getElementById('huggingfaceForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission
      
      const inputText = document.getElementById('inputText').value;
      const apiUrl = 'https://chaima710-model-1.hf.space/'; // Replace with your Hugging Face model URL
      const apiKey = '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'; // Replace with your Hugging Face API key

      fetch(apiUrl, {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${apiKey}`,
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ inputs: inputText }) // Adjust based on the model requirements
      })
      .then(response => response.json())
      .then(data => {
        // Handle the response data
        console.log(data);
        document.getElementById('responseContainer').innerText = JSON.stringify(data, null, 2); // Display response
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById('responseContainer').innerText = 'Error: ' + error.message;
      });
    });
  </script>

  <script src="accueil.js"></script>
</body>
</html>
