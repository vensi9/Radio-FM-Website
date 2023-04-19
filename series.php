<?php 
session_start();
include "layout/config.php";
$front_base_url = "http://localhost/pocket_fm/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= $front_base_url; ?>style/series.css">
    <title>Series</title>
</head>

<body>

    <div class="podcast-playlist-img" style="background: linear-gradient(45deg, black, transparent), url(images/series/travels16.jpg) repeat fixed 100%;">
    <nav>
        <ul>
            <li><a href="index.php" style="color:white;">Back</a></li>
        </ul>
    </nav>
        <div class="rm-head-caption">
            <h1>Series Archive</h1>
            <p>9 SERIES</p>
            <span class="pd-border"></span>
        </div>
    </div>

    <!-- card -->
    <section class="main-page">
        <div class="banner_slide">
            <?php 
            $seriessql = "SELECT * FROM tblstorys WHERE `category_id`=1 LIMIT 3";
            $seriesresult = mysqli_query($conn, $seriessql);
            if (mysqli_num_rows($seriesresult) > 0) {
                while($seriesrow = mysqli_fetch_assoc($seriesresult)) { 
                    $epsql = "SELECT COUNT(id) AS epcount FROM tblstory_ep WHERE story_id={$seriesrow['id']}";
                    $epresult = mysqli_query($conn,$epsql) or die ("query unscsessfull"); 
                    $eprow = mysqli_fetch_assoc($epresult); 
                    // echo "<pre>";print_r($eprow);die();
                    ?>
                    <div class="slide" style="background: linear-gradient(127deg, black, transparent), url('<?= $front_base_url.'story_image/'.$seriesrow['image']; ?>');">
                        <div class="slide_content">
                            <span class="slide-border">
                                <h6>SERIES</h6>
                                <h2><?= $seriesrow['name'] ?></h2>
                            </span>
                            <p><?= $seriesrow['description'] ?></p>
                            <div class="card-button">
                                <a href="<?= $front_base_url.'all_episode.php?story='.$seriesrow['id']; ?>" class="btn"> <i
                                        class="fa fa-play"></i>  <?= $eprow['epcount']; ?> EPISODES</a>
                                <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                            </div>
                        </div>
                    </div>
            <?php } } ?>
        </div>

        <!-- 2nd -->
        <div class="banner_slide">
            <div class="slide slide_four" style="background: linear-gradient(127deg, black, transparent), url(images/series/series-5-370x450.jpg);">
                <div class="slide_content">
                    <span class="slide-border">
                        <h6>SERIES</h6>
                        <h2>Lifestyle Podcast</h2>
                    </span>
                    <p>The Importance of Living a Healthy Lifestyle As a Family.</p>
                    <div class="card-button">
                        <a href="http://127.0.0.1:5502/SERIES/LIFESTYLE%20PODCAST/index.html" class="btn"> <i
                                class="fa fa-play"></i> 6 EPISODES</a>
                        <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                    </div>
                </div>
            </div>
            <div class="slide slide_five" style="background: linear-gradient(127deg, black, transparent), url(images/series/mindful.jpg);">
                <div class="slide_content">
                    <span class="slide-border">
                        <h6>SERIES</h6>
                        <h2>The Mindful Minute</h2>
                    </span>
                    <p>A podcast series that focuses on mindfulness meditation practices and techniques for cultivating
                        inner peace and calm.</p>
                    <div class="card-button">
                        <a href="http://127.0.0.1:5502/SERIES/THE%20MINDFUL%20MINUTE/index.html" class="btn"> <i
                                class="fa fa-play"></i> 7 EPISODES</a>
                        <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                    </div>
                </div>
            </div>
            <div class="slide slide_six" style="background: linear-gradient(127deg, black, transparent), url(images/series/series-4-370x450.jpg);">
                <div class="slide_content">
                    <span class="slide-border">
                        <h6>SERIES</h6>
                        <h2>Nature Podcast</h2>
                    </span>
                    <p>Nature Podcast is a weekly podcast featuring interviews and discussions about the latest research
                        and news in science and technology.</p>
                    <div class="card-button">
                        <a href="http://127.0.0.1:5502/SERIES/Nature%20Podcast/index.html" class="btn"> <i
                                class="fa fa-play"></i> 9
                            EPISODES</a>
                        <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3rd -->
        <div class="banner_slide">
            <div class="slide slide_seven" style="background: linear-gradient(127deg, black, transparent), url(images/series/series-8-370x450.jpg);">
                <div class="slide_content">
                    <span class="slide-border">
                        <h6>SERIES</h6>
                        <h2>Podcast For Success</h2>
                    </span>
                    <p>"Podcast For Success" is a motivational podcast that offers practical advice and strategies to
                        help listeners achieve their personal and professional goals.</p>
                    <div class="card-button">
                        <a href="http://127.0.0.1:5502/SERIES/PODCAST%20FOR%20SUCCESS/index.html" class="btn"> <i class="fa fa-play"></i> 8
                            EPISODES</a>
                        <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                    </div>
                </div>
            </div>
            <div class="slide slide_eight" style="background: linear-gradient(127deg, black, transparent), url(images/series/food8-370x370.jpg);">
                <div class="slide_content">
                    <span class="slide-border">
                        <h6>SERIES</h6>
                        <h2>Tech podcast</h2>
                    </span>
                    <p>Healthy cooking, tasty living! Discover the best cooking tricks and recipes with this podcast.
                    </p>
                    <div class="card-button">
                        <a href="http://127.0.0.1:5502/SERIES/TECH%20PODCAST/index.html" class="btn"> <i class="fa fa-play"></i> 7
                            EPISODES</a>
                        <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                    </div>
                </div>
            </div>
            <div class="slide slide_nine" style="background: linear-gradient(127deg, black, transparent), url(images/series/series-6-370x450.jpg);">
                <div class="slide_content">
                    <span class="slide-border">
                        <h6>SERIES</h6>
                        <h2>The Science podcast</h2>
                    </span>
                    <p>Exploring the latest developments and discoveries in science.</p>
                    <div class="card-button">
                        <a href="http://127.0.0.1:5502/SERIES/THE%20SCIENCE%20PODCAST/index.html" class="btn"> <i class="fa fa-play"></i> 11
                            EPISODES</a>
                        <a href="#" class="btn btn-transparent"><i class="fa fa-wifi" id="icon-wifi"></i>FOLLOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="footer">
            <div class="footer_content_image" style="background: url(./images/bg-4.jpg) no-repeat center;">
                <div class="footer_flex-end-list">
                    <div class="footer_content">
                        <img src="images/logo-default.jpg" alt="">
                        <ul class="footer-ul">
                            <li><a href="#"> PROMOTE</a> </li>
                            <li><a href="#"> CONTACTS</a> </li>
                            <li><a href="#"> TEAM</a> </li>
                            <li><a href="#"> PRIVACY POLICY</a> </li>
                        </ul>
                        <ul class="footer-ul">
                            <a href="#"><i class="fa fa-twitter"></i> </a>
                            <a href="#"><i class="fa fa-cloud"></i> </a>
                            <a href="#"><i class="fa fa-instagram"></i> </a>
                            <a href="#"><i class="fa fa-facebook"></i> </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= $front_base_url; ?>SERIES/script.js"></script>
    <script src="https://kit.fontawesome.com/1850990ada.js" crossorigin="anonymous"></script>

</body>

</html>