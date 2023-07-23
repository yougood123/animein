<?php
include '../_config.php';
session_start();
if(!isset($_COOKIE['userID'])){
    $user_id = $_COOKIE['userID'];
    header('location:login.php');
  };
  if(isset($_COOKIE['userID'])){
    $user_id = $_COOKIE['userID'];
  };
$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
}
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Watch List - <?=$websiteTitle?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="Watch List - <?=$websiteTitle?>">
    <meta name="description" content="Anime in HD with No Ads. Watch anime online">
    <meta name="keywords" content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa">
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Language" content="en">
    <meta property="og:title" content="Watch List - <?=$websiteTitle?>">
    <meta property="og:description" content="Anime on <?=$websiteTitle?> in HD with No Ads. Watch anime online">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$websiteTitle?>">
    <meta itemprop="image" content="<?=$banner?>">
    <meta property="og:image"
        content="<?=$banner?>">
    <meta property="og:site_name" content="<?=$websiteTitle?>">
    <link rel="canonical" href="<?=$websiteUrl?>/user/watchlist">
    <link rel="alternate" hreflang="en" href="<?=$websiteUrl?>/user/watchlist">
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

<body data-page="page_watchlists">
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
                                <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/profile"><i
                                            class="fas fa-user mr-2"></i>Profile</a></li>
                                <li class="nav-item"><a class="nav-link active" href="<?=$websiteUrl?>/user/watchlist"><i
                                            class="fas fa-heart mr-2"></i>Watch List</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?=$websiteUrl?>/user/changepass"><i
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
                    <div class="profile-box profile-list profile-list-fav">
                        <h2 class="h2-heading mb-4"><i class="fas fa-heart mr-3"></i>Watch List</h2>

                        <div class="block_area-content block_area-list film_list film_list-grid">
                            <div class="film_list-wrap">
                                <?php
                                $select = mysqli_query($conn, "SELECT * FROM `watch_later` WHERE user_id = '$user_id' ORDER BY id DESC") or die('query failed');
                                $rows = mysqli_fetch_all($select, MYSQLI_ASSOC); 
                                foreach ($rows as $rows) 
                                { ?>
                                <div class="flw-item">
                                    <div class="film-poster">
                                        <div class="tick ltr">
                                            <div class="tick-item-<?php $str = $rows['name'];
                                                  $last_word_start = strrpos ( $str , " ") + 1;
                                                  $last_word_end = strlen($str) - 1;
                                                  $last_word = substr($str, $last_word_start, $last_word_end);
                                                  if ($last_word == "(Dub)"){echo "dub";} else {echo "sub";}
                                                ?>  tick-eps amp-algn"><?php $str = $rows['name'];
                                                $last_word_start = strrpos ( $str , " ") + 1;
                                                $last_word_end = strlen($str) - 1;
                                                $last_word = substr($str, $last_word_start, $last_word_end);
                                                if ($last_word == "(Dub)"){echo "DUB";} else {echo "SUB";}
                                              ?></div>
                                        </div>
                                        <!--<div class="tick rtl">
                                            <div class="tick-item tick-eps amp-algn">
                                                EP 1040
                                            </div>
                                        </div>-->
                                        <img class="film-poster-img lazyload"
                                            data-src="<?=$rows['image']?>"
                                            src="<?=$rows['image']?>"
                                            alt="<?=$rows['name']?>">
                                        <a class="film-poster-ahref"
                                            href="<?=$websiteUrl?>/anime/<?=$rows['anime_id']?>" title="<?=$rows['name']?>"
                                            data-jname="<?=$rows['name']?>"><i class="fas fa-play"></i></a>
                                    </div>
                                    <div class="film-detail">
                                        <h3 class="film-name">
                                            <a class="dynamic-name"
                                                href="<?=$websiteUrl?>/anime/<?=$rows['anime_id']?>" title="<?=$rows['name']?>"
                                                data-jname="<?=$rows['name']?>"><?=$rows['name']?></a>
                                        </h3>
                                        <div class="fd-infor">
                                            <span class="fdi-item"><?=$rows['type']?></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pre-pagination mt-5 mb-5">
                                <nav aria-label="Page navigation">
                                </nav>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        
        <?php require('../_php/footer.php') ?>
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
    </div>
</body>

</html>