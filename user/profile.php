<?php 
require('../_config.php');
session_start();

if(!isset($_COOKIE['userID'])){
  $user_id = $_COOKIE['userID'];
  header('location:login.php');
};
if(isset($_COOKIE['userID'])){
  $user_id = $_COOKIE['userID'];
};

// Process the avatar upload if the form is submitted
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
  // ... (existing avatar upload code)
}

// Process the username change if the form is submitted
if (isset($_POST['username'])) {
  $new_username = $_POST['username'];

  // Validate the new username (add any additional validation rules as needed)
  if (empty($new_username)) {
    echo 'Username cannot be empty.';
    exit;
  }

  // Check if the new username is already taken
  $check_username_query = "SELECT * FROM `user_form` WHERE `name` = '$new_username' AND `id` != '$user_id'";
  $result = mysqli_query($conn, $check_username_query);
  if (mysqli_num_rows($result) > 0) {
    echo 'Username is already taken. Please choose a different one.';
    exit;
  }

  // Update the user's username in the database
  $update_username_query = "UPDATE `user_form` SET `name` = '$new_username' WHERE id = '$user_id'";
  if (mysqli_query($conn, $update_username_query)) {
    // Username update successful
    header('Location: profile.php'); // Redirect to the profile page
    exit;
  } else {
    echo 'Failed to update the username. Please try again.';
    exit;
  }
}


session_start();

// Check if the account has been deleted
if (isset($_SESSION['account_deleted']) && $_SESSION['account_deleted'] === true) {
  // Redirect to a different page, such as the homepage or login page
  header('Location: https://animein.fun/home'); // Replace with your actual website URL
  exit;
}

// ... (rest of the profile.php code)

?>


<!-- ... (rest of the HTML code) -->


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
    
  <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/min.css?v=<?=$version?>">
  <script type="text/javascript">
    setTimeout(function () {
      var wpse326013 = document.createElement('link');
      wpse326013.rel = 'stylesheet';
      wpse326013.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>';
      wpse326013.type = 'text/css';
      var godefer = document.getElementsByTagName('link')[0];
      godefer.parentNode.insertBefore(wpse326013, godefer);
      var wpse326013_2 = document.createElement('link');
      wpse326013_2.rel = 'stylesheet';
      wpse326013_2.href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>';
      wpse326013_2.type = 'text/css';
      var godefer2 = document.getElementsByTagName('link')[0];
      godefer2.parentNode.insertBefore(wpse326013_2, godefer2);
    }, 500);
  </script>
  <noscript>
    <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css?v=<?=$version?>" />
    <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css?v=<?=$version?>" />
  </noscript>
  <scripts></scripts>
  <style>
      /* Profile box account */
#wrapper .profile-box-account{
 transform:translatex(-3px) translatey(-259px);
}

@media (max-width:1400px){

 /* Profile box account */
 #wrapper .profile-box-account{
  transform:translatex(-4px) translatey(-241px);
 }
 
}

@media (max-width:1299px){

 /* Profile box account */
 #wrapper .profile-box-account{
  transform:translatex(0px) translatey(28px) !important;
 }
 
}

@media (max-width:1199px){

 /* Profile box account */
 #wrapper .profile-box-account{
  transform:translatex(0px) translatey(-118px);
 }
 
}

@media (max-width:1023px){

 /* Profile box account */
 #wrapper .profile-content .container .profile-box-account{
  transform:translatex(0px) translatey(-114px) !important;
 }
 
}

@media (max-width:860px){

 /* Profile box account */
 #wrapper .profile-box-account{
  transform:translatex(27px) translatey(-117px);
 }
 
}

@media (max-width:759px){

 /* Profile box account */
 #wrapper .profile-content .container .profile-box-account{
  transform:translatex(3px) translatey(-235px) !important;
 }
 
 /* Profile box account */
 #wrapper .profile-box-account{
  position:relative;
  top:-101px;
 }
 
}

@media (max-width:575px){

 /* Profile box account */
 #wrapper .profile-content .container .profile-box-account{
  transform:translatex(0px) translatey(-62px) !important;
 }
 
 /* Profile box account */
 #wrapper .profile-box-account{
  top:-200px;
 }
 
}

@media (max-width:479px){

 /* Profile box account */
 #wrapper .profile-content .container .profile-box-account{
  top:-200px !important;
 }
 
}

@media (max-width:320px){

 /* Profile box account */
 #wrapper .profile-box-account{
  top:-200px;
 }
 
 /* Footer about */
 #footer-about{
  transform:translatex(0px) translatey(-273px);
 }
 
 /* Container */
 #footer-about .container{
  transform:translatex(0px) translatey(255px);
 }
 
}

/* Block area content */
#main-wrapper .profile-box-account .block_area-content{
 transform:translatex(0px) translatey(0px);
}

/* Button */
.profile-box-account a{
 transform:translatex(-16px) translatey(-56px) !important;
}

/* Paragraph */
.profile-box-account .profile-details p{
 transform:translatex(-22px) translatey(67px);
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
        <div class="profile-header-cover"
          style="background-image: url(<?php echo $websiteUrl.'/files/avatar/'.$fetch['image'] ?>);"></div>
        <div class="container">
          <div class="ph-title"><?=$fetch['name']?></div>
          <div class="ph-tabs">
            <div class="bah-tabs">
              <ul class="nav nav-tabs pre-tabs">
                <li class="nav-item"><a class="nav-link active" href="<?=$websiteUrl?>/user/profile"><i
                      class="fas fa-user mr-2"></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/watchlist"><i class="fas fa-heart mr-2"></i>Watch
                    List</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/changepass"><i class="fas fa-key mr-2"></i>Change
                    Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/user_list.php"><i class="fas fa-user mr-2"></i>User List</a></li>
              </ul>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      </div>
      <div class="profile-content">
        <div class="container">
          <div class="profile-box profile-box-account makeup">
            <h2 class="h2-heading mb-4"><i class="fas fa-user mr-3"></i>Your Profile</h2>
            <div class="block_area-content">
              <div class="show-profile-avatar text-center mb-3">
                <div class="profile-avatar d-inline-block" data-toggle="modal" data-target="#modalavatars">
                  <?php
                  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                  if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  if ($fetch['image'] == '') {
                    echo '<img id="preview-avatar" src="'.$websiteUrl.'/files/avatar/default/default.jpeg">';
                  } else {
                    echo '<img id="preview-avatar" src="'.$websiteUrl.'/files/avatar/'.$fetch['image'].'">';
                  }
                  ?>
                </div>
              </div>
              <form class="preform" method="post" enctype="multipart/form-data" id="profile-form">
                <input type="hidden" name="avatar_id" value="1">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-email">Email address</label>
                      <input type="email" name="email" class="form-control" disabled id="pro5-email"
                        value="<?php echo $fetch['email']; ?>">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-name">Username</label>
                      <input type="text" class="form-control" disabled id="pro5-name" name="name" required
                        value="<?php echo $fetch['name']; ?>">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-join">Joined</label>
                      <input type="text" class="form-control" disabled id="pro5-join" value="<?php echo $fetch['date']; ?>">
                    </div>
                  </div>
                </div>
                <!-- Avatar Uploader -->
                <div class="form-group">
                  <label for="avatar">Choose Avatar:</label>
                  <input type="file" name="avatar" id="avatar" accept="image/jpeg, image/png, image/gif">
                </div>
                <button type="submit" class="btn btn-primary">Upload Avatar</button>
                
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal">Delete Account</button>

              </form>
  
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    
                <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete your account? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form method="post" action="delete_account.php">
          <button type="submit" class="btn btn-danger">Delete Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
<style>.modal-dialog .modal-body{
 color:#020202;
}
</style>

    <?php include '../_php/footer.php' ?>
     <div id="mask-overlay"></div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/app.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/comman.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/movie.js?v=<?=$version?>"></script>
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/jquery-ui.css?v=<?=$version?>">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js?v=<?=$version?>"></script>
    <script type="text/javascript" src="<?=$websiteUrl?>/files/js/function.js?v=<?=$version?>"></script>
    <div style="display:none;">
    </div>
    <script type="text/javascript">
      // Function to preview the selected image before uploading (optional, you can remove this if you don't need the preview)
      document.getElementById('avatar').addEventListener('change', function() {
        var preview = document.getElementById('preview-avatar');
        var file = this.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
          preview.src = reader.result;
        }

        if (file) {
          reader.readAsDataURL(file);
        } else {
          preview.src = "<?=$websiteUrl?>/files/avatar/default/default.jpeg";
        }
      });
    </script>
  </div>
</body>

</html>