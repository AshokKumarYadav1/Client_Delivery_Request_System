<?php
include "connection.php";
    session_start();
	if(isset($_POST['submit']))
	{
		$userid = $_POST['userid'];
		$to = $_POST['to'];
		$from = $_POST['from'];
		$date = $_POST['date'];
		$podate = $_POST['podate'];
		$path = $_POST['path'];
		$purpose = $_POST['purpose'];
		$description = $_POST['description'];
		$size = $_POST['size'];
		$numfiles = $_POST['n2'];
		$requestedby = $_POST['requestedby'];
		$managername = $_POST['managername'];

		$sql = "UPDATE `requestdetails1` SET `too` = '$to', `fromm` = '$from', `dayte` = '$date', `podate` = '$podate', `path` = '$path', `purpose` = '$purpose', `description` = '$description', `size` = '$size', `numfiles` = '$numfiles', `requestedby` = '$requestedby', `managername` = '$managername' WHERE `userid` = '$userid' ; UPDATE `managerrepo1` SET `too` = '$to', `fromm` = '$from', `dayte` = '$date', `podate` = '$podate', `path` = '$path', `purpose` = '$purpose', `description` = '$description', `size` = '$size', `numfiles` = '$numfiles', `requestedby` = '$requestedby', `managername` = '$managername' WHERE `userid` = '$userid' "; 

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