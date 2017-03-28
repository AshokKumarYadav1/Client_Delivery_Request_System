<?php 
   include "connection.php";
    session_start();
	if(isset($_POST['submit']))
	{
		header("location: index.php?id=".$_POST['userid']);
		$userid =  $_POST['userid'];
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

		$sql = "INSERT INTO requestdetails (`userid`, `dayte`, `podayt`, `tobedelivered`, `companyname`, `contactperson`, `email`, `deliverydetail`, `content`, `filepath`, `requestedby`,`deliveryincharge`,`managername`) VALUES ('$userid','$date', '$podate', '$tobedelivered', '$companyname', '$contactperson', '$useremail', '$deliverydetails', '$content', '$filepath', '$requestedby', '$deliveryincharge', '$managername');INSERT INTO managerrepo (`userid`, `dayte`, `podayt`, `tobedelivered`, `companyname`, `contactperson`, `email`, `deliverydetail`, `content`, `filepath`, `requestedby`,`deliveryincharge`,`managername`) VALUES ('$userid', '$date', '$podate', '$tobedelivered', '$companyname', '$contactperson', '$useremail', '$deliverydetails', '$content', '$filepath', '$requestedby', '$deliveryincharge', '$managername') ";
		
		if($conn->multi_query($sql) === TRUE)
		{
			echo "You have requested successfully!";	
			unset($_POST);
			//header("location: index.php?id=".$id);
		} 
		else 
		{
			echo "Problem in request. Try Again!";	
		}
	}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Request Form</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.mini.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.mini.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="css/datepicker.css">
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  	<script src="js/jquery-3.1.1.min.js"></script>
  	<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#dp1').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#dp2').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
</head>
<body>
<div class="container">
    <h1 class="col-lg-10 well">Client Delivery Request Form</h1>
	<div class="col-lg-10 well">
	<div class="row">
				<form name="frmRegistration" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="col-sm-12">
						<div class="row">
						<div class="col-sm-4 form-group">
								<label>User Id</label>
								<input type="text" name="userid" placeholder="" class="form-control" value="<?php echo base64_decode($_GET['id']); ?>">
							</div>
							<div class="col-sm-4 form-group">
								<label>Date</label>
								<input type="text" name="date" id="dp1" placeholder="Date like: 2017-02-23" class="form-control" required>
							</div>
							<div class="col-sm-4 form-group">
								<label>PO Date</label>
								<input type="text" name="poDate" id="dp2" placeholder="Date like: 2017-02-23" class="form-control" required>
							</div>
						</div>					
						<div class="form-group">
							<label>To be Delivered</label>
							<input type="text" name="tobeDelivered" placeholder="to be delivered" rows="3" class="form-control" required>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Comapany Name</label>
								<input type="text" name="companyName" placeholder="company name" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Contact Person</label>
								<input type="text" name="contactPerson" placeholder="contact person" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Email Address(for CD Delivery)</label>
								<input type="text" name="userEmail" placeholder="abc@gmail.com" class="form-control" required>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Deivery Details</label>
								<input type="text" name="deliveryDetails" placeholder="delivery detail" class="form-control" required>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Content</label>
								<input type="text" name="content" placeholder="content" class="form-control">
							</div>	
						</div>						
					<div class="form-group">
						<label>File Path(file saved at)</label>
						<input type="text" name="filePath" placeholder="D://abc/" class="form-control">
					</div>
					<div class="row">		
					<div class="col-sm-4 form-group">
						<label>Requested By</label>
						<input type="text" name="requestedBy" placeholder="requested by" class="form-control">
					</div>
					<div class="col-sm-4 form-group">
						<label>Deliver In Charge</label>
						<input type="text" name="deliverInCharge" placeholder="deliver in charge" class="form-control">
					</div>
					<div class="col-sm-4 form-group">
						<label>Manager</label>
						<input type="text" name="managerName" placeholder="enter manager name" class="form-control">
					</div>
					</div>	
					<input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info">					
					</div>
				</form> 
				</div>
	</div>
	</div>
</body>
</html>