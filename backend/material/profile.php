
<?php 

// print_r($rowdata);die();

if(isset($_POST['submit'])){
    $uid = $_POST['uid'];
    $vpass = $_POST['password'];
    $pass = md5($_POST['password']);
    $mobile = $_POST['mobile'];
    $name = $_POST['username'];
    $address = $_POST['address'];
    $updated_time = date('Y-m-d');
    $email = $_POST['email'];
 
    $table='tblusers';
    $return = 'profile.php';

    $data = "username='{$name}',email='{$email}',mobile='{$mobile}',address='{$address}',password='{$pass}',visible_pass='{$vpass}',updated_time='{$updated_time}'";
    $where = "user_id=".$uid;
    include 'update_data.php';


}
?>
<?php include('layout/sidebar.php'); 
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM tblusers WHERE user_id={$id}";
$result = mysqli_query($conn,$sql) or die ("query unscsessfull"); 
$rowdata = mysqli_fetch_assoc($result); 
?>
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Profile</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center"> 
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10"><?= isset($rowdata['username'])?$rowdata['username']:''; ?></h4>
                    <h6 class="card-subtitle"><?= isset($rowdata['email'])?$rowdata['email']:''; ?></h6> 
                </center>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6><?= isset($rowdata['email'])?$rowdata['email']:''; ?></h6> 
                <small class="text-muted p-t-30 db">Phone</small>
                <h6><?= isset($rowdata['mobile'])?$rowdata['mobile']:''; ?></h6> 
                <small class="text-muted p-t-30 db"><?= isset($rowdata['address'])?'Address':''; ?></small>
                <h6><?= isset($rowdata['address'])?$rowdata['address']:''; ?></h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Settings</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="post">
                            <input type="hidden" name="uid" value="<?= isset($rowdata['user_id'])?$rowdata['user_id']:''; ?>"> 
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" name="username" value="<?= isset($rowdata['username'])?$rowdata['username']:''; ?>"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com"
                                        class="form-control form-control-line" name="email" value="<?= isset($rowdata['email'])?$rowdata['email']:''; ?>" id="example-email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" value="<?= isset($rowdata['visible_pass'])?$rowdata['visible_pass']:''; ?>" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="123 456 7890" name="mobile" value="<?= isset($rowdata['mobile'])?$rowdata['mobile']:''; ?>" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <textarea rows="5" name="address" class="form-control form-control-line"><?= isset($rowdata['address'])?$rowdata['address']:''; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

<?php include('layout/footer.php');?>