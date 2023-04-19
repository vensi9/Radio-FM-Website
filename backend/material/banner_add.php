<?php 

$name = '';
$url = '';
$file = '';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $image = $_FILES['image'];
    $type = $_POST['type'];

    // if(!empty($image)){
    //     $errors = array();

    //     $file_name = rand(11111,999999) . $image['name'];
    //     $file_type = $image['type'];
    //     $tmp_name = $image['tmp_name'];
    //     $file_size = $image['size'];
    //     // $file_ext = strtolower(end(explode('.',$file_name)));

    //     // $extesnions = array("jpg","jpeg","png");
        
    //     // if(in_array($file_ext,$extesnions) === false)
    //     // {
    //     //     $errors[] = "This extesnion is not allowed, please choose a jpg and png file.";
    //     // }

    //     if($file_size > 10485760)
    //     {
    //         $errors[] = "file size must be 10mb or lover";
    //     }

    //     if(empty($errors) == true)
    //     {
    //         $imagefolder = "../banner_image/" . $file_name;
    //         move_uploaded_file($tmp_name,$imagefolder);
    //     }
    //     else
    //     {
    //         print_r($errors);
    //         die();
    //     }
    // }
    if(empty($image['name'])){
        $file_name = $_POST['old_image'];
    }else{
        $errors = array();
    
        unlink("../../banner_image/" . $_POST['old_image']);
        $file_name = rand(11111,999999) .$_POST['id'] . $image['name'];
        $file_type = $image['type'];
        $tmp_name = $image['tmp_name'];
        $file_size = $image['size'];
        // $file_ext = end(explode('.',$file_name));
        
        // echo "<pre>"; print_r($file_name);die();
    
        // $extesnions = array("jpg","jpeg","png");
        
        // if(in_array($file_ext,$extesnions) === false)
        // {
        //     $errors[] = "This extesnion is not allowed, please choose a jpg and png file.";
        // }
    
        if($file_size > 10485760)
        {
            $errors[] = "file size must be 10mb or lover";
        }
    
        if(empty($errors) == true)
        {
            $imagefolder = "../../banner_image/" . $file_name;
            move_uploaded_file($tmp_name,$imagefolder);
        }
        else
        {
            print_r($errors);
            die();
        }
    }
    
    // echo "<pre>";print_r($image);die;

    $table='tblbanner';
    $return = 'banner.php';

    if(!empty($id)){
        $data = "title='".$name."',url='".$url."',image='".$file_name."',type='".$type."'";
        $where = "id=".$id;
        include 'update_data.php';
    }else{
        $column = 'title,url,image,type';
        $data = "'".$name."','".$url."','".$file_name."','".$type."'";
        include 'insart_data.php';
    }


}

?>

<?php include('layout/sidebar.php');?>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Add Banner</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="banner.php">Banner</a></li>
            <li class="breadcrumb-item active">Add Banner</li>
        </ol>
    </div>
    <div class="col-md-7 col-4 align-self-center">
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php 
                    $id = isset($_GET['id'])?$_GET['id']:'';
                    $sql = "SELECT * FROM tblbanner WHERE id='$id'";
                    $result = mysqli_query($conn,$sql) or die ("query unscsessfull"); 
                    $rowdata = mysqli_fetch_assoc($result); 
                ?>
                <form  method="post" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" value="<?= isset($_GET['id'])?$_GET['id']:''; ?>"> 
                    <div class="form-group">
                        <h5>Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name" value="<?= isset($rowdata['title'])?$rowdata['title']:''; ?>" class="form-control name" required data-validation-required-message="This field is required"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Url</h5>
                        <div class="controls">
                            <input type="text" name="url" value="<?= isset($rowdata['url'])?$rowdata['url']:''; ?>" class="form-control url"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select class="form-control custom-select" name="type">
                            <option value="1" <?= isset($rowdata['type'])&&$rowdata['type']==1?'selected':''; ?>>Banner</option>
                            <option value="3" <?= isset($rowdata['type'])&&$rowdata['type']==3?'selected':''; ?>>Offer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>image </h5>
                        <div class="controls">
                            <input type="file" name="image" class="form-control file"> 
                            <input type="hidden" name="old_image" class="image" value="<?= isset($rowdata['image'])?$rowdata['image']:''; ?>">
                        </div>
                        <?php if(!empty($rowdata['image'])){ ?>
                        <img src="<?PHP echo "../../banner_image/" . $rowdata['image']; ?>" alt="image" width="300px" height="180px">
                        <?php } ?>
                    </div>
                    <div class="text-xs-right">
                        <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
                        <a href="banner.php" class="btn btn-inverse">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('layout/footer.php');?>