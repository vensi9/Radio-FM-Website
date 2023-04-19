`<?php 

include('layout/config.php'); 
// echo "<pre>";print_r($image);die;

$sql = "INSERT INTO `".$table."` (".$column.") VALUES (".$data.")";

if (mysqli_query($conn, $sql)) {
  header("location: ".$return."");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>