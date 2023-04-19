`<?php 

include('layout/config.php'); 
// echo "<pre>";print_r($data);die;

$sql = "UPDATE `".$table."` SET ".$data." WHERE ".$where."";

if (mysqli_query($conn, $sql)) {
  header("location: ".$return."");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>