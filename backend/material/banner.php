<?php 

$msg ="";
$msgErr ="";
if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];
    $unlinkImage = $_REQUEST['image'];
    $table='tblbanner';
    $where = "id=".$delete;
    include 'delete_data.php';
    // print_r($msg);die;
}

?>

<?php include('layout/sidebar.php');?>
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Banner</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Banner</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    Benner
                    <a href="banner_add.php" class="btn btn-info btn-rounded float-right"><i class="fas fa-plus"></i> Add</a>
                    <!-- <button type="button" class="btn btn-info btn-rounded float-right" data-toggle="modal"
                        data-target="#add-contact"><i class="fas fa-plus"></i> Add</button> -->
                </h4>
                <?php if(!empty($msg)){ ?>
                    <div class="alert alert-success"> <?= $msg; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                <?php } else if(!empty($msgErr)){ ?>
                    <div class="alert alert-danger"> <?= $msgErr; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Banner</th>
                                <th>Url</th>
                                <th>Banner type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM tblbanner";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $banner = '';
                                    if($row['type']==1){
                                        $banner .= 'slider';
                                    }elseif($row['type']==2){
                                        $banner .= 'Advertisement';
                                    }elseif($row['type']==3){
                                        $banner .= 'Offer';
                                    }
                            ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><img src="../../banner_image/<?php echo ($row['image'])?$row['image']:'Placeholder.jpg'; ?>" alt="image" style="width:100px;height: 70px;"></td>
                                <!-- <td><img src="../banner_image/<?php echo ($row['image'])?$row['image']:'Placeholder.jpg'; ?>" alt="image"></td> -->
                                <td><?= $row['url'] ?></td>
                                <td><?= $banner; ?></td>
                                <td>
                                    <form method="post">
                                        <a href="banner_add.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                        <input type="hidden" name="image" value="../../banner_image/<?php echo ($row['image'])?$row['image']:'Placeholder.jpg'; ?>">
                                        <button type="submit" name="delete" value="<?= $row['id'] ?>" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php');?>