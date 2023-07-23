<?php // ... (account deletion logic)

// Set a flag to indicate that the account has been deleted
$_SESSION['account_deleted'] = true;

// ... Your other PHP code and database operations for handling account deletion ...

// Assuming the account deletion process is successful
// Destroy the user's session and log out the user
session_destroy();

?>
<html>
<head>
  <title>Account Deleted - Your Website</title>
  <!-- Add your CSS and other script references here -->
</head>
<body>
  <h1>Account Deleted</h1>
  <p>Your account has been successfully deleted. We're sorry to see you go.</p>
  <h1>LOG OUT AFTER DELTING OTHERWISE YOUR ACCOUNT WON'T GET DELETED</h1>
  <p>Redirecting back to the homepage in <span id="countdown">10</span> seconds...</p>
  
  <!-- Add a JavaScript script to redirect after 5 seconds -->
  <script>
    var seconds = 10; // Number of seconds for the countdown
    var countdownElement = document.getElementById('countdown');

    function updateCountdown() {
      countdownElement.textContent = seconds;
      seconds--;

      if (seconds < 0) {
        window.location.href = "https://animein.fun/home"; // Replace with your actual website URL
      } else {
        setTimeout(updateCountdown, 1000); // Update the countdown every 1 second (1000 milliseconds)
      }
    }

    // Start the countdown
    updateCountdown();
  </script>
</body>
</html>
