<?php
session_start();
include "layout/config.php";
$front_base_url = "http://localhost/pocket_fm/";

$story_id = $_GET['story'];

$storysql = "SELECT * FROM tblstorys WHERE id={$story_id}";
$storyresult = mysqli_query($conn, $storysql) or die("query unscsessfull");
$storydata = mysqli_fetch_assoc($storyresult);

if($storydata['category_id']==1){
    $url = 'series.php';
}elseif($storydata['category_id']==2){
    $url = 'podcast.php';
}else{
    $url = "index.php";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIFESTYLE PODCAST-EPISODES</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?= $front_base_url; ?>live-link/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $front_base_url; ?>live-link/material-icons.css">
    <link rel="stylesheet" href="<?= $front_base_url; ?>style/all_episodes.css">
    <script src="<?= $front_base_url; ?>js/jquery.min.js"></script>

</head>

<body>
    <div class="main-page">
        <nav>
            <ul>
                <li><a href="<?= $url;?>" style="color:white;">Back</a></li>
            </ul>
        </nav>
        <div class="podcast-content">
            <div class="podcast-playlist-img"
                style="background: linear-gradient(45deg, black, transparent), url('<?= $front_base_url . 'story_image/' . $storydata['image']; ?>') repeat fixed 100%;">
                <div class="rm-head-caption">
                    <h1>
                        <?= $storydata['name']; ?>
                    </h1>
                    <p>
                        <?= $storydata['description']; ?>
                    </p>
                </div>
            </div>
            <!-- episode -->
            <div class="episodes">
                <h1>Episodes</h1>
                <span class="pd-border"></span>
                <div class="episode_container">

                    <?php
                    $sql = "SELECT * FROM tblstory_ep WHERE story_id={$story_id}";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="ep-content">
                                <audio class="podcast_<?= $row['id'] ?>" id="podcast_<?= $row['id'] ?>">
                                    <source src="<?= $front_base_url . 'episode_audio/' . $row['audio'] ?>" type="audio/mpeg">
                                </audio>
                                <span class="material-icons play-pause" id="play-pause"
                                    data-id="<?= $row['id'] ?>">play_circle</span>
                                <div class="ep-content-txt">
                                    <h2>
                                        <?= $row['name'] ?>
                                    </h2>
                                    <!-- <p>This episode could explore the concept of minimalism and how it can lead to a simpler,
                                    more intentional lifestyle.</p>
                                <p>- Drew Schafer</p> -->
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <h1>No Episodes</h1>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $(document).delegate(".play-pause", "click", function (e) {


                var el_ = $(this);
                var id = $(this).attr('data-id');
                var audio = document.getElementById('podcast_' + id);

                if (audio.paused) {
                    $(".play-pause").each(function () {
                        var ids = $(this).attr('data-id');
                        var audios = document.getElementById('podcast_' + ids);

                        audios.pause();
                        $(this).html('<span class="material-icons" style="font-size: 4.5rem;">play_circle</span>');
                    });
                    audio.play();
                    el_.html('<span class="material-icons" style="font-size: 4.5rem;">pause_circle</span>');
                } else {
                    audio.pause();
                    el_.html('<span class="material-icons" style="font-size: 4.5rem;">play_circle</span>');
                }

                // $(".play-pause").each(function(){
                //     var ids = $(this).attr('data-id');
                //     var audios = document.getElementById('podcast_'+ids);

                //     audios.pause();
                //     $(this).html('<span class="material-icons" style="font-size: 4.5rem;">play_circle</span>');
                // });
                // $('audio').pause();

                // var el_ = $(this);
                // var id = $(this).attr('data-id');
                // var audio = document.getElementById('podcast_'+id);

                // // alert(audio);return false;
                // if (audio.paused) {
                //     audio.play();
                //     el_.html('<span class="material-icons" style="font-size: 4.5rem;">pause_circle</span>');
                // } else {
                //     audio.pause();
                //     el_.html('<span class="material-icons" style="font-size: 4.5rem;">play_circle</span>');

                // }
            });
        });

    </script>
    <script src="<?= $front_base_url; ?>js/1850990ada.js" crossorigin="anonymous"></script>


</body>

</html>