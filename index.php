<?php 
    session_start();
    include "layout/config.php";
    $front_base_url = "http://localhost/pocket_fm/";
    // error_reporting(0);
    
    $email ="";
    $pass ="";

    $emailErr ="";
    $error = "";

    if(isset($_POST['signupbtn'])){
        $vpass = $_POST['password'];
        $pass = md5($_POST['password']);
        $mobile = $_POST['mobile'];
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $created_time = date('Y-m-d');
        $updated_time = date('Y-m-d');
        $email = $_POST['email'];

        $sql1 = "SELECT * FROM tblusers WHERE `email`='$email'";
        $result1 = mysqli_query($conn,$sql1) or die ("query unscsessfull");
        if (mysqli_num_rows($result1) > 0) {
            $error = "Email is already exists check Your email";
        }else{
            $sql = "INSERT INTO `tblusers` (`username`, `email`, `mobile`, `gender`, `dob`, `password`, `visible_pass`, `created_time`, `updated_time`) 
                    VALUES ('[{$name}]','[{$email}]','[{$mobile}]','[{$gender}]','[{$dob}]','[{$pass}]','[{$vpass}]','[{$created_time}]','[{$updated_time}]')";
            $result = mysqli_query($conn,$sql) or die ("query unscsessfull");
            if(!empty($result)){
                header("location: index.php");
            }
        }



    }
    
    if(isset($_POST['login'])){
    
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM tblusers WHERE `email`='$email' AND `visible_pass`='$pass'";
        $result = mysqli_query($conn,$sql) or die ("query unscsessfull");
        if (mysqli_num_rows($result) > 0) {

                $_SESSION['email']=$email;    
                $_SESSION['password']=$pass;

                $row = mysqli_fetch_assoc($result);

                // print_r($row);die;

                $_SESSION['username'] = $row['username'];
                $_SESSION['mobile'] = $row['mobile'];
                $_SESSION['picture'] = $row['picture'];
                $_SESSION['visible_pass'] = $row['visible_pass'];
                $_SESSION['user_id']=$row['user_id'];
                header("location: index.php");

        } else {
            $error = "Email and password is invelid";
        }
    }
    
    // if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    //     header("location: index.php");
    // }
        
    if(isset($_REQUEST['logout'])){
        header("location: layout/logout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="<?= $front_base_url; ?>live-link/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?= $front_base_url; ?>live-link/material-icons.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/responsive.css">
    <title>POCKET FM</title>
    

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <!-- <header> -->
    <div class="navbar-fixed">
        <div class="navbar">
            <div class="navbar-fix">
                <nav>
                    <img src="./images/logo-default.jpg" alt="logo" class="brand">

                    <span class="nav" onclick="openNav()">&#9776;</span>

                    <ul>
                        <a href="<?= $front_base_url; ?>index.php">
                            <li class="nav-list">Home</li>
                        </a>
                        <a href="<?= $front_base_url; ?>podcast.php">
                            <li class="nav-list">Podcasts</li>
                        </a>
                        <a href="<?= $front_base_url; ?>series.php">
                            <li class="nav-list">Series</li>
                        </a>
                        <!-- <a href="">
                            <li class="nav-list">Contact us</li>
                        </a> -->
                    </ul>
                    <div class="search-user">
                        <!-- <i class="fa fa-search" id="fa-search" aria-hidden="true"></i> -->
                        <?php if(isset($_SESSION['email'])){ ?>
                            <form method="post">
                                <button class="id01" name="logout"
                                    style="width:auto;">Logout</button>
                            </form>
                            <div class="dropdown">
                                <button class="dropbtn"><img src="./images/bg-4.jpg" alt="">radiofm
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <a href="#" onclick="document.getElementById('id03').style.display='block'"
                                        style="width:auto;">Profile<span class='material-icons'
                                            style="font-size: 19px;">launch</span>
                                    </a>
                                    
                                    <a href="layout/logout.php" style="width:auto;">Log out<span class="material-icons"
                                        style="font-size: 19px;">logout</span></a>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <!-- sign-up -->
                            <button class="id02" onclick="document.getElementById('id02').style.display='block'"
                                style="width:auto;"><span>Sign up</span></button>
                            <!-- login -->
                            <button class="id01" onclick="document.getElementById('id01').style.display='block'"
                                style="width:auto;margin-left: 15px;">Login</button>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>



    <!-- sidenavbar -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <img src="./images/logo-default.jpg" alt="logo" class="nav-logo">
        <ul>

            <li><a href="<?= $front_base_url; ?>index.html">Home</a></li>
            <li><a href="<?= $front_base_url; ?>PODCAST/index.html">Podcasts</a></li>
            <li><a href="<?= $front_base_url; ?>SERIES/index.html">Series</a></li>
        </ul>
    </div>

    <!-- <span class="nav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> -->





    <!-- profile-content -->

    <div id="id03" class="modal3">

        <form class="modal-content3 animate" method="post">
            <div class="imgcontainer1">
                <h1>Profile details</h1>
                <span onclick="document.getElementById('id03').style.display='none'" class="close5" style="right:1px"
                    title="Close Modal">&times;</span>
            </div>
            <div class="profile_content">
                <div class="profile_img">
                    <img src="./images/business9.jpg" alt="" class="image">
                    <div class="middle">
                        <span class='material-icons'>edit</span>
                        <button style="cursor:pointer" id="btn" class="text">Choose photo</button>
                        <input type="file" id="inputField" style="display:none">
                    </div>
                </div>
                <div class="profile_container">
                    <input class="profile_input" type="text" name="uname"><br>
                    <button type="submit" class="save_btn">Save</button>
                </div>
            </div>
        </form>
    </div>

    <!--log-out -->

    <div id="id04" class="modal4">
        <form class="modal-content4 animate" action="/action_page.php" method="post">
            <div class="logout_content">
                <img src="./images/logo-default.jpg" alt="" class="logout_img">
                <button type="submit" class="LOG-OUT" onclick="document.getElementById('id01').style.display='block'"
                    style="width:auto;">Log in</button>
                <h5>Don't have an account? <a href="#" style="color:dodgerblue;text-decoration: underline;"
                        onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGNUP</a>
                </h5>
            </div>
        </form>
    </div>

    <!-- signup-form -->
    <div id="id02" class="modal2">
        <form class="modal-content1 animate" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close4"
                    title="Close Modal">&times;</span>
            </div>
            <div class="sign-up-form">

                <span class="error"  style="margin-bottom: 23px;color: red;"><?php echo $error; ?></span>
                <label for="email">
                    <h2>What's your email?</h2>
                </label>
                <input class="sign-up-txt-pw" type="email" placeholder="Enter your email." name="email" required>
                
                <label for="tel">
                    <h2>Enter your phone number</h2>
                </label>
                <input class="sign-up-txt-pw" type="number" placeholder="Enter your Phone Number." name="mobile" autocomplete="off" required>

                <label for="psw">
                    <h2>Create a password</h2>
                </label>
                <input class="sign-up-txt-pw" type="password" placeholder="Create a password" name="password" required>
                <label for="psw-repeat">
                    <h2>What should we call you?</h2>
                </label>
                <input class="sign-up-txt-pw" type="text" placeholder="Enter a profile name." name="name" required>
                <p class="sign-up-name">This appears on your profile.</p>

                <label for="date">
                    <h2 style="padding-top: 5px;">What's your date of birth?</h2>
                </label>
                <input type="date" placeholder="Enter your email again." name="dob" style="width: 100%;" required>

                <label for="gender">
                    <h2>What's your gender?</h2>
                    <section class="gender">
                        <span class="gender-checkbox">
                            <input type="radio" name="gender" value="0" style="margin-right: 7px;" checked>Male</span>
                        <span class="gender-checkbox">
                            <input type="radio" name="gender" value="1" style="margin-right: 7px;" >Female</span>
                        <span class="gender-checkbox">
                            <input type="radio" name="gender" value="2" style="margin-right: 7px;" >Non-binary</span>
                        <span class="gender-checkbox">
                            <input type="radio" name="gender" value="3" style="margin-right: 7px;" >Other</span>
                    </section>
                </label>

                <h6>By creating an account you agree to our <a href="#"
                        style="color:dodgerblue;text-decoration: underline;">Terms & Privacy</a>.</h6>

                <div class="clearfix">
                    <button type="submit" name="signupbtn" class="signupbtn">Sign Up</button>
                </div>
                <!-- <h5>Have an account? 
                    <a href="<?= $front_base_url; ?>index.html#"
                        style="color:dodgerblue;text-decoration: underline;"
                        class="id01"
                        onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log in</a>.
                </h5> -->

            </div>
        </form>
    </div>



    <!-- login-form -->

    <div id="id01" class="modal1">

        <form class="modal-content1 animate" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
            </div>
            <span class="error"><?php echo $error; ?></span>
            <h1>Log in</h1>
            <div class="login-input-content">
                <label for="uname">
                    <h2>Email address or username</h2>
                </label>
                <input class="log-in-txt-pw" type="text" placeholder="Enter Username" name="email" required>

                <label for="psw">
                    <h2>Password</h2>
                </label>
                <input class="log-in-txt-pw" type="password" placeholder="Enter Password" name="password" required>
                <span class="psw"> <a href="#"> Forgot your password?</a></span>
                <div class="login-btn">
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <button type="submit" name="login" class="login">LOG IN</button>
                </div>

            </div>
            <!-- <div class="sign-up-content">
                <h4 style="font-weight: 500;">Don't have an account?</h4>
                <button type="submit" class="SIGN-UP" onclick="document.getElementById('id02').style.display='block'"
                    style="width:auto;">SIGN UP</button>
            </div> -->
        </form>
    </div>


    <!-- slideshow -->

    <div class="slideshow-container">
        <!-- 1st img -->
        <div class="slideshow-slide">
            <img src="./images/nature12.jpg" class="slide-img" width="100%" alt="">
            <div class="pfm-slide-flex">
                <div class="wpcast-ser">
                    <h6 class="wpcast">
                        <span class="wpcast-ser-txt1">The Science Podcast</span>
                        <span class="wpcast-dot"></span>
                        <span class="wpcast-meta">BY CHRIS Beckett & Shane Ludtke ON JANUARY 19, 2023</span>
                    </h6>
                    <h2 class="wpcast-title">Building a career in astronomy os the future</h2>
                    <p class="wpcast-per">"Building a career in astronomy for the future" is a podcast that explores the
                        latest developments and opportunities in the field of astronomy, and provides guidance and
                        advice for those interested in pursuing a career in this exciting and rapidly growing field.</p>
                    <div class="wpcast-btn">
                        <!-- <a href="<?= $front_base_url; ?>read%20more-1/index.html" target="_blank" class="btn1"
                            id="wpcast-btn-1" type="button" value="submit">
                            <i class="fa fa-play"></i>READ ALL
                        </a>
                        <a href="#" class="btn1" id="wpcast-btn-2" type="button" value="submit">
                            <i class="fa fa-wifi" id="icon-wifi"></i>SUBSCRIBE
                        </a> -->
                    </div>
                </div>
                <audio id="podcast1">
                    <source src="./mp3/134888episode 1053.mp3" type="audio/mpeg">
                </audio>
                <div class="play-icon-flex-end">
                    <span class="material-icons" id="play-pause1" style="font-size: 84px;">play_circle_outline</span>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <!-- 2nd img -->
        <div class="slideshow-slide">
            <img src="./images/business9.jpg" width="100%" alt="">
            <div class="pfm-slide-flex">
                <div class="wpcast-ser">
                    <h6 class="wpcast">
                        <span class="wpcast-ser-txt1">The Business Podcast</span>
                        <span class="wpcast-dot"></span>
                        <span class="wpcast-meta">BY RICK MULREADY ON MARCH 01, 2023</span>
                    </h6>
                    <h2 class="wpcast-title">tips to help you become a better online business person</h2>
                    <p class="wpcast-per">"The Online Business Podcast" offers practical tips and expert advice on
                        building and managing a successful online business, covering topics like e-commerce, marketing,
                        and social media.</p>
                    <div class="wpcast-btn">
                        <!-- <a href="<?= $front_base_url; ?>read-more-2/index.html" class="btn" id="wpcast-btn-1"
                            type="button" value="submit">
                            <i class="fa fa-play"></i>READ ALL
                        </a>
                        <a href="" class="btn" id="wpcast-btn-2" type="button" value="submit">
                            <i class="fa fa-wifi" id="icon-wifi"></i>SUBSCRIBE
                        </a> -->
                    </div>
                </div>
                <audio id="podcast">
                    <source src="mp3/380150episode 1052.mp3" type="audio/mpeg">
                </audio>
                <div class="play-icon-flex-end">
                    <span class="material-icons" id="play-pause" style="font-size: 84px;">play_circle_outline</span>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>

        <!-- 3rd img -->
        <div class="slideshow-slide">
            <img src="./images/nebula.jpg" width="100%" alt="">
            <div class="pfm-slide-flex">
                <div class="wpcast-ser">
                    <h6 class="wpcast">
                        <span class="wpcast-ser-txt1">The Science Podcast</span>
                        <span class="wpcast-dot"></span>
                        <span class="wpcast-meta">BY KLARE SIMMON ON JANUARY 23, 2019</span>
                    </h6>
                    <h2 class="wpcast-title">The Large Hardon collider and the search for the higgs-boson</h2>
                    <p class="wpcast-per">"The Large Hadron Collider and the Search for the Higgs-Boson" is a podcast
                        that delves into the fascinating world of particle physics, exploring the latest research and
                        discoveries related to the elusive Higgs-Boson particle.</p>
                    <div class="wpcast-btn">
                        <!-- <a href="<?= $front_base_url; ?>read-more-3/index.html" class="btn" id="wpcast-btn-1"
                            type="button" value="submit">
                            <i class="fa fa-play"></i>READ ALL
                        </a>
                        <a href="#" class="btn" id="wpcast-btn-2" type="button" value="submit">
                            <i class="fa fa-wifi" id="icon-wifi"></i>SUBSCRIBE
                        </a> -->
                    </div>
                </div>
                <audio id="podcast2">
                    <source src="./mp3/5590155_6111543934549231593.mp3" type="audio/mpeg">
                </audio>
                <div class="play-icon-flex-end">
                    <span class="material-icons" id="play-pause2" style="font-size: 84px;">play_circle_outline</span>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <div class="dots-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>



    <section class="podcast-series">
        <h1>STORYS SERIES</h1>
        <span class="pd-border"></span>
    </section>

    <!-- card -->
    <section class="banner_slide">
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
        
    </section>


    <section class="cards-1">
        <div class="cards">
            <div class="card_container">
                <div class="post-container">
                    <h1>PODCAST POSTS</h1>
                    <span class="post-border"></span>
                </div>

                <?php 
                $podcastsql = "SELECT * FROM tblstorys WHERE `category_id`=2 LIMIT 3";
                $podcastresult = mysqli_query($conn, $podcastsql);
                if (mysqli_num_rows($podcastresult) > 0) {
                    while($podcastrow = mysqli_fetch_assoc($podcastresult)) { ?>
                        <div class="card-content">
                            <div class="card-img" id="card-img" style="background: linear-gradient(180deg, black, transparent), url('<?= $front_base_url.'story_image/'.$podcastrow['image']; ?>');">
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
                                <!-- <audio id="podcast3">
                                    <source src="mp3/wpcast-podcast-samples-1.mp3" type="audio/mpeg">
                                </audio> -->
                                <span class="material-icons" id="play-pause3"></span>
                                <!-- <span class="material-icons" id="play-pause3">play_circle_outline</span> -->
                                <div class="card-bottom-feature">
                                    <!-- <span class="f-dot"></span>
                                    <p>FEATURED</p> -->
                                </div>
                            </div>
                            <div class="card_flex_content" id="card-flex-content">
                                <div class="card-captions">
                                    <h1><?= $podcastrow['name'] ?></h1>
                                    <div class="card_h5-h6">
                                        <h5>KLARE SIMMON</h5>
                                        <h6><?= date_format(date_create($podcastrow['created_time']),"M d, Y"); ?></h6>
                                    </div>
                                    <p>Do you want to know how to travel smarter, not harder? Join "Travel Smarter, Not Harder",
                                        a podcast sharing tips and tricks for adventurers looking to enhance their travel
                                        experiences.</p>
                                    <span class="card-read-more">
                                        <a href="<?= $front_base_url.'all_episode.php?story='.$podcastrow['id']; ?>">READ MORE</a><i
                                            class="fa fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                <?php } } ?>
                

            </div>

            <div class="card-btn">
                <a href="<?= $front_base_url; ?>/podcast.php" class="more_btn">MORE POSTS</a>
            </div>

            <section class="card_right_container">
                

                <!-- popular podcast content-->
                <div class="card-flex-end-populer-img">
                    <div class="card-flex-end-h1-span">
                        <h1>MOST POPULAR PODCAST</h1>
                        <span class="card-caption-border"></span>
                    </div>
                    <div class="card-flex-right-img">
                        <div class="card-flex-right-img-caption">
                            <div class="card-flex-right-img-top-caption">
                                <p>THE SCIENCE PODCAST</p>
                                <span class="card-top-caption-border"></span>
                            </div>
                        </div>
                        <div class="card-flex-end-img-caption-grid-bottom">
                            <div class="card-flex-right-bottom-feature">
                                <span class="f-dot"></span>
                                <p>FEATURED</p>
                            </div>
                            <div class="card-flex-end-img-caption">
                                <a href="<?= $front_base_url; ?>read-more-3/index.html" style="text-decoration: none;">
                                    <h2>The Large Hardon Collider and the Search for the Hiigs...</h2>
                                </a>
                                <div class="card-flex-end-box-h5-h6">
                                    <h5>KLARE SIMMON</h5>
                                    <h6>JANUARY 23, 2019</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- recent podcast content -->
                <div class="recent-podcast">
                    <div class="card-flex-end-h1-span">
                        <h1>RECENT PODCAST</h1>
                        <span class="card-caption-border"></span>
                    </div>
                    <?php 
                        $newpodcastsql = "SELECT * FROM tblstorys WHERE `category_id`=2  ORDER BY id DESC LIMIT 3";
                        $newpodcastresult = mysqli_query($conn, $newpodcastsql);
                        if (mysqli_num_rows($newpodcastresult) > 0) {
                            while($newpodcastrow = mysqli_fetch_assoc($newpodcastresult)) { ?>
                            <div class="recent-podcast-img-captions">
                                <div class="recent-podcast-img">
                                    <img src="<?= $front_base_url.'story_image/'.$newpodcastrow['image']; ?>" alt="">
                                    <div class="recent-podcast-caption">
                                        <a href="<?= $front_base_url.'all_episode.php?story='.$newpodcastrow['id']; ?>"
                                            style="text-decoration: none;">
                                            <h4><?= $newpodcastrow['name'] ?></h4>
                                        </a>
                                        <h3><?= date_format(date_create($newpodcastrow['created_time']),"M d, Y"); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <span class="recent-podcast-bottom-border"></span>
                    <?php } } ?>
                </div>
            </section>
        </div>
    </section>



   
    <footer>
        <div class="footer">
            <div class="footer_content_image" style="background: url(./images/bg-4.jpg) no-repeat center;">
                <div class="footer_flex-end-list">
                    <div class="footer_content">
                        <img src="./images/logo-default.jpg" alt="">
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


    <script src="play-pause.js"></script>
    <script src="login-form.js"></script>
    <script src="https://kit.fontawesome.com/1850990ada.js" crossorigin="anonymous"></script>

</body>

</html>