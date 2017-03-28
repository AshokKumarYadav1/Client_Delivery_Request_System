<?php
include "connection.php";
    session_start();
	if(isset($_POST['submit']))
	{
		$userid = $_POST['userid'];
		$date = $_POST['date'];
		$podate = $_POST['poDate'];
		$tobedelivered = $_POST['tobeDelivered'];
		$companyname = $_POST['companyName'];
		$contactperson = $_POST['contactPerson'];
		$useremail = $_POST['userEmail'];
		$deliverydetails = $_POST['deliveryDetails'];
		$content = $_POST['content'];
		$filepath = $_POST['filePath'];
		$requestedby = $_POST['requestedBy'];
		$deliveryincharge = $_POST['deliverInCharge'];
		$managername = $_POST['managerName'];

		$sql = "UPDATE `requestdetails` SET `dayte` = '$date', `podayt` = '$podate', `tobedelivered` = '$tobedelivered', `companyname` = '$companyname', `contactperson` = '$companyname', `contactperson` = '$contactperson', `email` = '$useremail', `deliverydetail` = '$deliverydetails', `content` = '$content', `filepath` = '$filepath', `requestedby` = '$requestedby', `deliveryincharge`  = '$deliveryincharge', `managername` = '$managername' WHERE `userid` = '$userid' ; UPDATE `managerrepo` SET `dayte` = '$date', `podayt` = '$podate', `tobedelivered` = '$tobedelivered', `companyname` = '$companyname', `contactperson` = '$companyname', `contactperson` = '$contactperson', `email` = '$useremail', `deliverydetail` = '$deliverydetails', `content` = '$content', `filepath` = '$filepath', `requestedby` = '$requestedby', `deliveryincharge`  = '$deliveryincharge', `managername` = '$managername' WHERE `userid` = '$userid' "; 

		if($conn->multi_query($sql) === TRUE)
		{
			echo "You have requested successfully!";	
			unset($_POST);
			header("location: index.php");
		} 
		else 
		{
			echo "Problem in request. Try Again!";	
		}
	}
	session_destroy();


?>         