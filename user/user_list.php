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

// Fetch all users from the database
$select_users = mysqli_query($conn, "SELECT * FROM `user_form`") or die('query failed');
$users = array();

while ($row = mysqli_fetch_assoc($select_users)) {
  $users[] = $row;
}
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>User List - <?=$websiteTitle?></title>
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
    /* Table */
    .scrollable-container {
      max-height: 400px;
      overflow-y: auto;
      margin-top: 20px;
      border: 1px solid #ccc;
    }

    .scrollable-table {
      width: 100%;
      border-collapse: collapse;
    }

    .scrollable-table th,
    .scrollable-table td {
      padding: 8px;
      border: 1px solid #ccc;
    }

    .scrollable-table th {
      background-color: #f2f2f2;
    }

    /* Th */
    table tr th {
      transform: translateX(0px) translateY(0px);
      margin-left: 0px;
    }

    /* Th */
    table thead tr th {
      width: 84px !important;
    }

    @media (max-width: 860px) {
      /* Table */
      table {
        transform: translateX(253px) translateY(41px);
      }
    }
    
    /* Th */
.profile-box-account tr th{
 color:#020202;
 background-color:#3a3a3a;
}
/* Image */
.profile-box-account tr img{
 border-top-left-radius:4px;
 border-top-right-radius:4px;
 border-bottom-left-radius:4px;
 border-bottom-right-radius:4px;
}

@media (max-width:860px){

 /* Division */
 .profile-box-account .block_area-content div{
  transform:translatex(94px) translatey(-5px);
 }
 
 /* Division */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div{
  width:64% !important;
 }
 
 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(-10px);
 }
 
 /* Table */
 table{
  transform:translatex(0px) translatey(0px);
 }
 
}

@media (max-width:759px){

 /* Block area content */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(0px) !important;
 }
 
}

@media (max-width:575px){

 /* Scrollable table */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div .scrollable-table{
  width:217px !important;
 }
 
 /* Table */
 table{
  position:relative;
  left:61px;
  transform:translatex(-32px) translatey(12px);
  top:0px;
 }
 
 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(0px);
 }
 
}

@media (max-width:479px){

 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(-21px) translatey(17px);
 }
 
 /* Table */
 table{
  transform:translatex(0px) translatey(0px);
 }
 
}
@media (max-width:860px){

 /* Division */
 .profile-box-account .block_area-content div{
  transform:translatex(94px) translatey(-5px);
 }
 
 /* Division */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div{
  width:64% !important;
 }
 
 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(-10px);
 }
 
 /* Table */
 table{
  transform:translatex(0px) translatey(0px);
 }
 
}

@media (max-width:759px){

 /* Block area content */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(0px) !important;
 }
 
}

@media (max-width:575px){

 /* Scrollable table */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div .scrollable-table{
  width:217px !important;
 }
 
 /* Table */
 table{
  position:relative;
  left:61px;
  transform:translatex(-32px) translatey(12px);
  top:0px;
 }
 
 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(0px);
 }
 
}

@media (max-width:479px){

 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(-21px) translatey(17px);
 }
 
 /* Table */
 table{
  transform:translatex(0px) translatey(0px);
 }
 
}

@media (max-width:320px){

 /* Block area content */
 .profile-header .profile-box-account .block_area-content{
  transform:translatex(0px) translatey(0px);
 }
 
 /* Division */
 .profile-box-account .block_area-content div{
  transform:translatex(-8px) translatey(4px);
 }
 
 /* Division */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div{
  width:265px !important;
 }
 
 /* Table */
 table{
  transform:translatex(-43px) translatey(0px);
  cursor:all-scroll;
  overflow:visible;
 }
 
}
@media (max-width:479px){

 /* Division */
 .profile-box-account .block_area-content div{
  transform:translatex(-24px) translatey(0px);
 }
 
 /* Table */
 table{
  transform:translatex(-58px) translatey(0px);
  display:inline-block;
 }
 
 /* Division */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div{
  width:320px !important;
 }
 
 /* Scrollable table */
 #wrapper #main-wrapper .profile-header .container .container .profile-box-account .block_area-content div .scrollable-table{
  width:279px !important;
 }
 
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
                <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/profile"><i
                      class="fas fa-user mr-2"></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link " href="<?=$websiteUrl?>/user/watchlist"><i class="fas fa-heart mr-2"></i>Watch
                    List</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/changepass"><i class="fas fa-key mr-2"></i>Change
                    Password</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?=$websiteUrl?>/user/user_list.php"><i class="fas fa-user mr-2"></i>User List</a></li>
              </ul>
            </div>
          </div>


<!-- User List -->
<div class="container">
  <div class="profile-box profile-box-account makeup">
    <h2 class="h2-heading mb-4">User List</h2>
    <div class="block_area-content">
      <div class="scrollable-container">
        <table class="scrollable-table">
          <thead>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Avatar</th> <!-- New column for Avatar -->
              <!-- Add more columns here if needed -->
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
              <td><?=$user['id']?></td>
              <td>
                <a href="<?=$websiteUrl?>/user/selected_profile.php?id=<?=$user['id']?>"><?=$user['name']?></a>
              </td>
              <td>
                <?php if ($user['image'] == '') { ?>
                  <img src="<?=$websiteUrl?>/files/avatar/default/default.jpeg" alt="Default Avatar" width="50">
                <?php } else { ?>
                  <img src="<?=$websiteUrl?>/files/avatar/<?=$user['image']?>" alt="User Avatar" width="50">
                <?php } ?>
              </td>
              <!-- Add more columns here if needed -->
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>





    <!-- Include footer.php -->
    <?php include '../_php/footer.php'; ?>
  </div>
</body>

</html>
