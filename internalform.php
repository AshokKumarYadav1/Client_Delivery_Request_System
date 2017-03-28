<?php 
   include "connection.php";
     session_start();
	if(isset($_POST['submit']))
	{
		header("location: index.php?id=".$_POST['userid']);
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

		$sql = "INSERT INTO requestdetails1 (`userid`, `too`, `fromm`, `dayte`, `podate`, `path`, `purpose`,`description`,`size`, `numfiles`, `requestedby`, `managername`) VALUES ('$userid', '$to', '$from', '$date', '$podate', '$path','$purpose', '$description', '$size', '$numfiles','$requestedby', '$managername');INSERT INTO managerrepo1 (`userid`, `too`, `fromm`, `dayte`, `podate`, `path`, `purpose`,`description`,`size`, `numfiles`, `requestedby`, `managername`) VALUES ('$userid', '$to', '$from', '$date', '$podate', '$path','$purpose', '$description', '$size', '$numfiles','$requestedby', '$managername') ";
		
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
<!DOCTYPE html>
<html>
<head>
	<title>Interal Movement Form</title>
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
	
		$(function(){
    	$('#f').change(function(){
        var combinedSize = 0;
        var num = 0;
        for(var i=0;i<this.files.length;i++) {
            combinedSize += (this.files[i].size||this.files[i].fileSize);
            num = this.files.length;
            
        }
        //alert(num);
        if(num>=1)
        {
        	var n2 = document.getElementById('n2');
        	n2.value = num;
        }
        if(combinedSize<1024)
        {
        	//alert('Bytes' +combinedSize);
        	var s = document.getElementById('size');
        	s.value = combinedSize;
        }
        else
        {
        	if(combinedSize<1048576)
        	{
        		var temp = Math.round((combinedSize / 1024));
        		//alert('KB' +temp);
        		var s = document.getElementById('size');
        		s.value = temp+' '+'KB';
        	}
        	else
        	{
        		if(combinedSize<1073741824)
        		{
        			var temp = Math.round((combinedSize / 1048576));
        			//alert('MB' +temp);
        			var s = document.getElementById('size');
        			s.value = temp+' '+'MB';
        		}
        		else
        		{
        			var temp = Math.round((combinedSize / 1073741824));
        			//alert('GB' +temp);
        			var s = document.getElementById('size');
        			s.value = temp+' '+'GB';
        		}
        	}
        }
        
    })
})

		$(function(){$('#myfile').change(function(e) 
		{
		//var filenames = fs.readdirSync(this);
			
  			var totalSize = [].reduce.call(this.files, function(tot, currFile)
  			{
    			console.log(currFile.name , ' size=', currFile.size);
    			return tot + currFile.size;

  			}, 0);
  			
  			var num = this.files.length;
            //console.log(num);
            if(num>=1)
            {
                var n2 = document.getElementById('n2');
                n2.value = num;
            }
            
  			if(totalSize<1024)
        	{
        		//alert('Bytes' +totalSize);
        		var s = document.getElementById('size');
        		s.value = totalSize;
        	}
        	else
        	{
        		if(totalSize<1048576)
        		{
        			var temp = Math.round((totalSize / 1024));
        			//alert('KB' +temp);
        			var s = document.getElementById('size');
        			s.value = temp+' '+'KB';
        		}
        		else
        		{
        			if(totalSize<1073741824)
        			{
        				var temp = Math.round((totalSize / 1048576));
        				//alert('MB' +temp);
        				var s = document.getElementById('size');
        				s.value = temp+' '+'MB';
        			}
        			else
        			{
        				var temp = Math.round((totalSize / 1073741824));
        				//alert('GB' +temp);
        				var s = document.getElementById('size');
        				s.value = temp+' '+'GB';
        			}
        		}
        	}

		})
	})


	 </script>
</head>
<body>
<div class="container">
    <h1 class="col-lg-10 well">Internal Movement Form</h1>
	<div class="col-lg-10 well">
	<div class="row">
				<form name="internalmovemnet" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="col-sm-12">
						<div class="row">
						<div class="col-sm-4 form-group">
								<label>User Id</label>
								<input type="text" name="userid" placeholder="" class="form-control" value="<?php echo base64_decode($_GET['id']); ?>">
							</div>
							<div class="col-sm-4 form-group">
								<label>To</label>
								<input type="text" name="to" placeholder="to" class="form-control" required>
							</div>
							<div class="col-sm-4 form-group">
								<label>From</label>
								<input type="text" name="from" placeholder="from" class="form-control" required>
							</div>
						</div>					
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Date</label>
								<input type="text" name="date" id="dp1" placeholder="Date like: 2017-02-23" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>PO Date</label>
								<input type="text" name="podate" id="dp2" placeholder="Date like: 2017-02-23" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Path</label>
								<input type="text" name="path" placeholder="D:\\" class="form-control" required>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Purpose</label>
								<input type="text" name="purpose" placeholder="purpose" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Browse Files</label>
								<input id="f" name="f" type="file" multiple >(no need to add total no of Files)
							</div>	
							<div class="col-sm-4 form-group">
								<label>Browse Directories</label>
								<input type="file" name="files[]" id="myfile" multiple="" webkitdirectory="" >(no need to add total no Of File)
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Description</label>
								<input type="text" name="description" placeholder="description" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Size</label>
								<input type="text" id="size" name="size" placeholder="" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Total No. Files</label>
								<input type="text" name="n2" id="n2" placeholder="" class="form-control" required>
							</div>
							</div>
							<div class="row">
							<div class="col-sm-6 form-group">
								<label>Requested By</label>
								<input type="text" name="requestedby" placeholder="requestedby" class="form-control" required>
							</div>
							<div class="col-sm-6 form-group">
								<label>Manager</label>
								<input type="text" name="managername" placeholder="manager name" class="form-control" required>
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