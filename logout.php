<?php 
session_start();
$id = $_GET['id'];
$encid = base64_encode($id);
$_SESSION['empid'] = $id;
unset($_SESSION['id']); 
session_destroy(); 
header("Location: index.php?id=".$encid);
?>