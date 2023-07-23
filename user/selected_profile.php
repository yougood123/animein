<?php
require('../_config.php');
session_start();

// Check if user ID is provided in the URL query parameter
if (isset($_GET['id'])) {
  $selected_user_id = $_GET['id'];
} else {
  // Redirect to user list if no ID is provided
  header('Location: '.$websiteUrl.'/user/user_list.php');
  exit;
}

// Fetch the selected user's profile from the database using their ID
$select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE `id` = '$selected_user_id'") or die('query failed');
$selected_user = mysqli_fetch_assoc($select_user);
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Profile - <?=$websiteTitle?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="title" content="Profile - <?=$websiteTitle?>">
  <meta name="description" content="Anime in HD with No Ads. Watch anime online">
  <meta name="keywords"
    content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa">
  <meta name="charset" content="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Language" content="en">
  <meta property="og:title" content="Profile - <?=$websiteTitle?>">
  <meta property="og:description" content="Anime on <?=$websiteTitle?> in HD with No Ads. Watch anime online">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?=$websiteTitle?>">
  <meta itemprop="image" content="<?=$banner?>">
  <meta property="og:image" content="<?=$banner?>">
  <link rel="canonical" href="<?=$websiteUrl?>">
  <link rel="alternate" hreflang="en" href="<?=$websiteUrl?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>" type="text/css">
  <link rel="shortcut icon" href="<?=$websiteUrl?>/favicon.ico?v=<?=$version?>" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?=$websiteUrl?>/favicon.ico?v=<?=$version?>" />
  <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/style.css?v=<?=$version?>">

  <style>
    /* Image */
    .profile-box-account img{
      display:inline-block;
      transform:translatex(443px) translatey(24px);
      border-style:solid;
      border-top-left-radius:50px;
      border-top-right-radius:50px;
      border-bottom-right-radius:50px;
      border-bottom-left-radius:50px;
    }

    /* Paragraph */
    .profile-box-account p{
      padding-bottom:0px;
      position:relative;
      top:-118px;
      font-weight:600;
      font-size:28px;
      line-height:1.6em;
    }

    /* Block area content */
    #main-wrapper .profile-box-account .block_area-content{
      transform:translatex(0px) translatey(0px);
      height:213px;
    }

    /* "Watchlist" button style */
    .watchlist-button {
      margin-top: 10px;
    }
  </style>
</head>
<body data-page="page_profile">
  <div id="sidebar_menu_bg"></div>
  <div id="wrapper" data-page="page_home">
    <?php include '../_php/header.php'; ?>
    <div class="clearfix"></div>

    <div id="main-wrapper" class="layout-page layout-profile">
      <div class="profile-header">
        <!-- Profile header content -->
      </div>

      <!-- Profile tabs -->
      <div class="container">
        <div class="ph-tabs">
          <div class="bah-tabs">
            <ul class="nav nav-tabs pre-tabs">
              <!-- Navigation links for Profile, Watchlist, Change Password, etc. -->
              <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/profile.php"><i
                    class="fas fa-user mr-2"></i>Profile</a></li>
              <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/selected_watchlist.php?id=<?php echo $selected_user['id']?>"><i class="fas fa-heart mr-2"></i>Watch
                  List</a></li>
              <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/changepass.php"><i class="fas fa-key mr-2"></i>Change
                  Password</a></li>
              <li class="nav-item"><a class="nav-link active" href="<?=$websiteUrl?>/user/user_list.php"><i class="fas fa-user mr-2"></i>User
                  List</a></li>
            </ul>
          </div>
        </div>

        <!-- Profile content for selected user -->
        <div class="profile-box profile-box-account makeup">
          <h2 class="h2-heading mb-4">Profile - <?=$selected_user['name']?></h2>
          <div class="block_area-content">
            <div class="profile-details">
              <!-- Display selected user's avatar -->
              <?php if ($selected_user['image'] == '') { ?>
                <img src="<?=$websiteUrl?>/files/avatar/default/default.jpeg" alt="Default Avatar" width="100">
              <?php } else { ?>
                <img src="<?=$websiteUrl?>/files/avatar/<?=$selected_user['image']?>" alt="User Avatar" width="100">
              <?php } ?>

              <!-- Display selected user's profile details here -->
              <p>User ID: <?=$selected_user['id']?></p>
              <p>Name: <?=$selected_user['name']?></p>
              <!-- Add more profile details here if needed -->
            </div>
            
            <!-- "Watchlist" button to see selected user's watchlist -->
            <?php
            // Check if the current user is viewing their own profile or someone else's profile
            if ($selected_user['id'] == $user_id) {
              // If viewing own profile, redirect to own watchlist
              $watchlist_url = $websiteUrl . '/user/watchlist.php';
            } else {
              // If viewing someone else's profile, redirect to their watchlist
              $watchlist_url = $websiteUrl . '/user/selected_watchlist.php?id=' . $selected_user['id'];
            }
            ?>
            <a class="btn btn-primary watchlist-button" href="<?=$watchlist_url?>">Watchlist</a>
          </div>
        </div>
      </div>
    </div>
    <style>/* Button */
.profile-box-account a{
 transform:translatex(0px) translatey(-124px);
}
</style>

    <!-- Include footer.php -->
    <?php include '../_php/footer.php'; ?>
  </div>
</body>

</html>
