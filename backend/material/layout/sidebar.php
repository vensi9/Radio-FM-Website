<?php include('header.php'); ?>
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url(<?= $base_url; ?>assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?= $base_url; ?>assets/images/users/profile.png" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                    role="button" aria-haspopup="true" aria-expanded="true"><?= isset($_SESSION['username'])?$_SESSION['username']:''; ?></a>
                <div class="dropdown-menu animated flipInY">
                    <a href="profile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <!-- <div class="dropdown-divider"></div>  -->
                    <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">PERSONAL</li>
                <li>
                    <a class="" href="index.php"><i class="mdi mdi-gauge"></i><span>Dashboard </span></a>
                </li>
                <li>
                    <a class="" href="user_list.php"><i class="ti-user"></i><span>User List </span></a>
                </li>
                <li>
                    <a class="" href="banner.php"><i class="ti-image"></i><span>Banner </span></a>
                </li>
                <li>
                    <a class="" href="category.php"><i class="ti-layers-alt"></i><span>Category </span></a>
                </li>
                <li>
                    <a class="" href="storys.php"><i class="ti-layout-media-left-alt"></i><span>Storys </span></a>
                </li>
                <li>
                    <a class="" href="episode.php"><i class="ti-layout-grid3-alt"></i><span>All Episodes </span></a>
                </li>
                <!-- <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.php">Dashboard 1</a></li>
                            </ul>
                        </li> -->
                <li class="nav-devider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a class="link" ></a>
        <!-- <a href="setting.php" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a> -->
        <!-- item-->
        <a class="link"></a>
        <!-- <a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> -->
        <!-- item-->
        <a href="logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">