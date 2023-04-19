<?php 
include('layout/sidebar.php');
$result = mysqli_query($conn,'SELECT COUNT(id) AS countdata FROM tblbanner') or die ("query unscsessfull");
$banner=mysqli_fetch_assoc($result);
$result2 = mysqli_query($conn,'SELECT COUNT(id) AS countdata FROM tblcategory') or die ("query unscsessfull");
$category=mysqli_fetch_assoc($result2);
$result3 = mysqli_query($conn,'SELECT COUNT(id) AS countdata FROM tblstorys') or die ("query unscsessfull");
$story=mysqli_fetch_assoc($result3);
$result4 = mysqli_query($conn,'SELECT COUNT(id) AS countdata FROM tblstory_ep') or die ("query unscsessfull");
$story_ep=mysqli_fetch_assoc($result4);
?>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
    </div>
</div>

<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <a href="<?= $base_url.'material/banner.php'; ?>">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-info"><i class="ti-image"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h5 class="text-muted m-b-0">Banner</h5>
                        <h3 class="m-b-0 font-light"><?= isset($banner['countdata'])?$banner['countdata']:'00'; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <a href="<?= $base_url.'material/category.php'; ?>">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-warning"><i class="ti-layers-alt"></i>
                    </div>
                    <div class="m-l-10 align-self-center">
                        <h5 class="text-muted m-b-0">Category</h5>
                        <h3 class="m-b-0 font-lgiht"><?= isset($category['countdata'])?$category['countdata']:'00'; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <a href="<?= $base_url.'material/storys.php'; ?>">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-primary"><i class="ti-layout-media-left-alt"></i>
                    </div>
                    <div class="m-l-10 align-self-center">
                        <h5 class="text-muted m-b-0">Storys</h5>
                        <h3 class="m-b-0 font-lgiht"><?= isset($story['countdata'])?$story['countdata']:'00'; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <a href="<?= $base_url.'material/episode.php'; ?>">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-danger"><i class="ti-layout-grid3-alt"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h5 class="text-muted m-b-0">All Episode</h5>
                        <h3 class="m-b-0 font-lgiht"><?= isset($story_ep['countdata'])?$story_ep['countdata']:'00'; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<?php include('layout/footer.php'); ?>