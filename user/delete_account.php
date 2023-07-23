<?php
require('../_config.php');
session_start();

if (!isset($_COOKIE['userID'])) {
  header('location:login.php');
  exit;
}

$user_id = $_COOKIE['userID'];

// Process the account deletion request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Add any additional verification or authentication steps here, if needed.

  // Delete user data from the database
  $delete_user_query = "DELETE FROM `user_form` WHERE `id` = '$user_id'";
  if (mysqli_query($conn, $delete_user_query)) {
    // Account deletion successful
    // Redirect to the homepage or a confirmation page
    header('Location: deleted_account_confirmation.php');
    exit;
  } else {
    // Handle error if the account deletion fails
    echo 'Failed to delete the account. Please try again.';
    exit;
  }
}
?>
