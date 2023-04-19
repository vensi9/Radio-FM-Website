<?php 

$msg ="";
$msgErr ="";
if (isset($_REQUEST['delete'])) {
    $delete = $_REQUEST['delete'];
    $unlinkImage = $_REQUEST['image'];
    $table='tblcategory';
    $where = "id=".$delete;
    include 'delete_data.php';
    // print_r($msg);die;
}

?>

<?php include('layout/sidebar.php');?>
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">category</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">category</li>
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
                    <a href="category_add.php" class="btn btn-info btn-rounded float-right"><i class="fas fa-plus"></i> Add</a>
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
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM tblcategory";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><img src="../../category_image/<?php echo ($row['picture'])?$row['picture']:'Placeholder.jpg'; ?>" alt="image" style="width:100px;height: 70px;"></td>
                                <td>
                                    <form method="post">
                                        <a href="category_add.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                                        <input type="hidden" name="image" value="../../category_image/<?php echo ($row['picture'])?$row['picture']:'Placeholder.jpg'; ?>">
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