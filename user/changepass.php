<?php 
require('../_config.php');

session_start();

if(!isset($_COOKIE['userID'])){
  header('location:login.php');
};

if(isset($_COOKIE['userID'])){
  $user_id =$_COOKIE['userID'];
};


      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if(isset($_POST['update_profile'])){
$old_pass = $_POST['old_pass'];
$update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
$new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
$confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
   if($update_pass != $old_pass){
      $message[] = 'Old Password Not Matched!';
   }elseif($new_pass != $confirm_pass){
      $message[] = 'Confirm Password Not Matched!';
   }else{
      mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
      $message2[] = 'Password Updated Successfully!';
   }
}
      }
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Change Password - <?=$websiteTitle?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="title" content="Change Password - <?=$websiteTitle?>">
  <meta name="description" content="Anime in HD with No Ads. Watch anime online">
  <meta name="keywords"
    content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa">
  <meta name="charset" content="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="robots" content="index, follow">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Content-Language" content="en">
  <meta property="og:title" content="Change Password - <?=$websiteTitle?>">
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
</head>

<body data-page="page_changepass">
  <div id="sidebar_menu_bg"></div>
  <div id="wrapper" data-page="page_home">
    <?php include '../_php/header.php'; ?>
    <div class="clearfix"></div>

    <div id="main-wrapper" class="layout-page layout-profile">
      <div class="profile-header">
        <div class="profile-header-cover"
          style="background-image: url(<?php 
          if($fetch['image'] == ''){
            echo ''.$websiteUrl.'/files/avatar/default/default.jpeg';
         }else{
            echo ''.$websiteUrl.'/files/avatar/'.$fetch['image'].'';
         }?>);"></div>
        <div class="container">
        <div class="ph-title"><?=$fetch['name']?></div>
          <div class="ph-tabs">
            <div class="bah-tabs">
              <ul class="nav nav-tabs pre-tabs">
                <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/profile"><i
                      class="fas fa-user mr-2"></i>Profile</a></li>
               <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/watchlist"><i class="fas fa-heart mr-2"></i>Watch
                    List</a></li> 
                <li class="nav-item"><a class="nav-link active" href="<?=$websiteUrl?>/user/changepass"><i
                      class="fas fa-key mr-2"></i>Change Password</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/user_list.php"><i class="fas fa-user mr-2"></i>User List</a></li>
              </ul>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="profile-content">
        <div class="container">
          <div class="profile-box profile-box-account makeup">
            <h2 class="h2-heading mb-4"><i class="fas fa-key mr-3"></i>Change Password</h2>
            <div class="block_area-content">
              <div class="show-profile-avatar text-center mb-3">
                <div class="profile-avatar d-inline-block" data-toggle="modal" data-target="#modalavatars">
                  <?php
                   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                   if(mysqli_num_rows($select) > 0){
                      $fetch = mysqli_fetch_assoc($select);
                   }
                  if($fetch['image'] == ''){
   echo '<img id="preview-avatar" src="'.$websiteUrl.'/files/avatar/default/default.jpeg">';
}else{
   echo '<img id="preview-avatar" src="'.$websiteUrl.'/files/avatar/'.$fetch['image'].'">';
}?>
                </div>
              </div>
              <form class="preform" method="post" action=""  enctype="multipart/form-data">
              <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <label class="prelabel" for="pro5-currentpass">Current Password</label>
                      <input type="password" class="form-control" id="pro5-currentpass" name="update_pass">
                    </div>
                    <div class="form-group">
                      <label class="prelabel" for="pro5-pass">New Password</label>
                      <input type="password" class="form-control" id="pro5-pass" name="new_pass">
                    </div>
                    <div class="form-group">
                      <label class="prelabel" for="pro5-confirm">Confirm New Password</label>
                      <input type="password" class="form-control" id="pro5-confirm" name="confirm_pass">
                    </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="form-group">
                      <div class="mt-4"></div>
                      <input type="submit" value="Save" name="update_profile" class="btn btn-block btn-primary">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <?php include '../_php/footer.php'; ?>
    
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js?v=<?=$version?>"></script>
    <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<script type="text/javascript">swal({title: "Error!",text: "'.$message.'",icon: "warning",button: "Close",})</script>;';
         }
      }
      ?>
      <?php
      if(isset($message2)){
         foreach($message2 as $message2){
            echo '<script type="text/javascript">swal({title: "Success!",text: "'.$message2.'",icon: "success",button: "Close",})</script>;';
         }
      }
      ?>
    <div style="display:none;">
    </div>
  </div>
</body>

</html>