<?php 
include('layout/config.php'); 
$cate_id = $_POST['cate_id'];
$output = '';

$sql = "SELECT * FROM tblstorys WHERE category_id = '$cate_id'"; 
$result = mysqli_query($conn,$sql) or die ("query unscsessfull");
// echo "<pre>"; print_r($result); die();
$output = '<option value="">select</option>';

while($row = mysqli_fetch_array($result)) {
    $output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
echo $output;
?>