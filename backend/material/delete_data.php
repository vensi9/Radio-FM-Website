<?php 

include('layout/config.php'); 

$sql1 = "SELECT * FROM `".$table."` WHERE ".$where."" ;
$result = mysqli_query($conn,$sql1) or die ("query unscsessfull");

$row = mysqli_fetch_assoc($result);

unlink($unlinkImage);

$sql = "DELETE FROM `".$table."` WHERE ".$where."";


if(mysqli_multi_query($conn, $sql)){
    // header("location: ".$return."");
    $msg = "Your record is delete.";
}else{
    $msgErr = "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>