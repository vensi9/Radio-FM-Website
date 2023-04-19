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
    <link rel="stylesheet" href="style/podcast.css">
    <title>PODCASTS</title>
</head>

<body>

    <div class="podcast-playlist-img" style="background: linear-gradient(45deg, black, transparent), url(./images/bg-2.jpg) repeat fixed 100%;">
    <nav>
        <ul>
            <li><a href="index.php" style="color:white;">Back</a></li>
        </ul>
    </nav>
        <div class="rm-head-caption">
            <h1>Podcasts Archive</h1>
            <!-- <p>9 SERIES</p> -->
            <span class="pd-border"></span>
        </div>
    </div>

    <!-- card -->
    <div class="main-page">
        <div class="podcast">
            <?php 
            $podcastsql = "SELECT * FROM tblstorys WHERE `category_id`=2 ";
            $podcastresult = mysqli_query($conn, $podcastsql);
            if (mysqli_num_rows($podcastresult) > 0) {
                while($podcastrow = mysqli_fetch_assoc($podcastresult)) { ?>
                <div class="card-content">
                    <div class="card-img" style="background: linear-gradient(180deg, black, transparent), url('<?= $front_base_url.'story_image/'.$podcastrow['image']; ?>');">
                        <div class="card-img-caption">
                            <div class="card-img-top-caption">
                                <p>NEW PODCAST</p>
                                <span class="card-caption-border"></span>
                            </div>
                            <div class="card-views">
                                <i class="fa fa-eye">
                                    <span class="view"> 345</span></i>
                                <i class="fa fa-heart">
                                    <span class="view"> 223</span></i>
                            </div>
                        </div>
                        <span class="material-icons" id="play-pause"></span>
                        <div class="card-bottom-feature">
                        </div>
                    </div>
                    <div class="card_flex_content">
                        <div class="card-captions">
                            <h1><?= $podcastrow['name'] ?></h1>
                            <div class="card_h5-h6">
                                <h5>KLARE SIMMON</h5>
                                <h6><?= date_format(date_create($podcastrow['created_time']),"M d, Y"); ?></h6>
                            </div>
                            <p><?= $podcastrow['description'] ?></p>
                            <span class="card-read-more">
                                <a href="<?= $front_base_url.'all_episode.php?story='.$podcastrow['id']; ?>">READ MORE</a><i
                                    class="fa fa-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } } ?>

        </div>

    </div>
    </div>












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

    <script src="https://kit.fontawesome.com/1850990ada.js" crossorigin="anonymous"></script>

</body>

</html>