<?php
include("connection.php");
$mn = $_POST['mn'];

$sql = "UPDATE `managerrepo` SET `is_approved` ='1' WHERE `id` = '$mn'; UPDATE `requestdetails` SET `is_approved` ='1' WHERE `id` = '$mn' "; 
mysqli_multi_query($conn, $sql) or die (mysqli_multi_error($conn, $sql));

?>          