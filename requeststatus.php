<?php include "header.php"; ?>
<?php include "connection.php";
	session_start();
	$id = $_GET['id'];
	$_SESSION['empid'] = $id;
	//echo $id;
 ?>
<?php ?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Status</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.mini.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.mini.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation" style="border-radius: 4px; height: 64px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php?id=<?php echo $_SESSION['empid']?>"><img src="img/logo.png" style="height: 30px; margin-left: 14px; "></a>
    </div>
  </div>
</nav>
<div class="container">
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#menu1">Client Delivery Pendings</a></li>
    <li><a data-toggle="tab" href="#menu2">Internal Movement Pendings</a></li>
    <li><a data-toggle="tab" href="#menu3">Edit Client Dilivery</a></li>
    <li><a data-toggle="tab" href="#menu4">Edit Internal Movement</a></li>
  </ul>
<div class="tab-content">

<!-- Client Delivery Request On Hold-->
<div id="menu1" class="tab-pane fade">
      <?php
      //if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    include "connection.php";

    //$id = $_SESSION['id'];
	$id = $_GET['id'];
	$decid = base64_decode($id);
	//echo $id;
    //$id = 'CN002096';
    //$i = 1; 
    $sql = "SELECT *FROM requestdetails WHERE is_approved='0' AND userid = '$decid' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      ?>  
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>Date</th>
        <th>PO Date</th>
        <th>to be Delivered</th>
        <th>Comapny Name</th>
        <th>Contact Person</th>
        <th>Email Address</th>
        <th>Delivery Details</th>
        <th>Content</th>
        <th>File Path</th>
        <th>Requested by</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row['dayte']; ?></td>
        <td><?php echo $row['podayt']; ?></td>
        <td><?php echo $row['tobedelivered']; ?></td>
        <td><?php echo $row['companyname']; ?></td>
        <td><?php echo $row['contactperson']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['deliverydetail']; ?></td>
        <td><?php echo $row['content']; ?></td>
        <td><?php echo $row['filepath']; ?></td>
        <td><?php echo $row['requestedby']; ?></td>

      </tr>
    </tbody>
  </table>
  <?php
  //$i++;
      }
  } else {
      echo "<h2>No results Found !<h2>";
  }
$conn->close();

?>
</div>
  <?php
//}
/*else{
  include "error.php";

}*/
?>
    </div>
<!--Internal Movement Request On hold-->

<div id="menu2" class="tab-pane fade">
      <?php
      //if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    include "connection.php";
    //$id = $_SESSION['id'];
    //$id = 'CN002096';
    //$i = 1;
	$id = $_GET['id'];
	$decid = base64_decode($id);	
    $sql = "SELECT *FROM requestdetails1 WHERE is_approved='0' AND userid = '$decid' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      ?>  
          <table class="table table-bordered">
    <thead>
      <tr>
         <th>To</th>
        <th>From</th>
        <th>Date</th>
        <th>Po Date</th>
        <th>Path</th>
        <th>Purpose</th>
        <th>Description</th>
        <th>Size</th>
        <th>No. Of Files</th>
        <th>Requested By</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row['too']; ?></td>
        <td><?php echo $row['fromm']; ?></td>
        <td><?php echo $row['dayte']; ?></td>
        <td><?php echo $row['podate']; ?></td>
        <td><?php echo $row['path']; ?></td>
        <td><?php echo $row['purpose']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><?php echo $row['numfiles']; ?></td>
        <td><?php echo $row['requestedby']; ?></td>

      </tr>
    </tbody>
  </table>
  <?php
  //$i++;
      }
  } else {
      echo "<h2>No results Found !<h2>";
  }
$conn->close();

?>
</div>
  <?php
//}
/*else{
  include "error.php";

}*/
?>
    </div>

  <!--Client Edit Hold Operation-->
    <div id="menu3" class="tab-pane fade">

<div class="container">
  <?php 
    include "connection.php";
    //$i = 1;
	$id = $_GET['id'];
	$decid = base64_decode($id);	
    $sql = "SELECT *FROM requestdetails WHERE is_approved='0' AND userid = '$decid' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      ?>  
          <div class="container">
    <h1 class="col-lg-10 well">Client Delivery Request Form</h1>
  <div class="col-lg-10 well">
  <div class="row">
        <form name="frmRegistration" method="post" action="editclientrequest.php">
          <div class="col-sm-12">
            <div class="row">
            <div class="col-sm-4 form-group">
                <label>User Id</label>
                <input type="text" name="userid" placeholder="" class="form-control" value="<?php echo $row['userid']; ?> ">
              </div>
              <div class="col-sm-4 form-group">
                <label>Date</label>
                <input type="text" name="date" placeholder="" class="form-control" value="<?php echo $row['dayte']; ?> " required>
              </div>
              <div class="col-sm-4 form-group">
                <label>PO Date</label>
                <input type="text" name="poDate" placeholder="" class="form-control" value="<?php echo $row['podayt']; ?> " required>
              </div>
            </div>          
            <div class="form-group">
              <label>To be Delivered</label>
              <input type="text" name="tobeDelivered" placeholder="" rows="3" class="form-control" value="<?php echo $row['tobedelivered']; ?> " required>
            </div>  
            <div class="row">
              <div class="col-sm-4 form-group">
                <label>Comapany Name</label>
                <input type="text" name="companyName" placeholder="" class="form-control" value="<?php echo $row['companyname']; ?> " required>
              </div>  
              <div class="col-sm-4 form-group">
                <label>Contact Person</label>
                <input type="text" name="contactPerson" placeholder="" class="form-control" value="<?php echo $row['contactperson']; ?> " required>
              </div>  
              <div class="col-sm-4 form-group">
                <label>Email Address(for CD Delivery)</label>
                <input type="text" name="userEmail" placeholder="" class="form-control" value="<?php echo $row['email']; ?> " required>
              </div>    
            </div>
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Deivery Details</label>
                <input type="text" name="deliveryDetails" placeholder="" class="form-control" value="<?php echo $row['deliverydetail']; ?> " required>
              </div>    
              <div class="col-sm-6 form-group">
                <label>Content</label>
                <input type="text" name="content" placeholder="" class="form-control" value="<?php echo $row['content']; ?> " required>
              </div>  
            </div>            
          <div class="form-group">
            <label>File Path(file saved at)</label>
            <input type="text" name="filePath" placeholder="" class="form-control" value="<?php echo $row['filepath']; ?> " required>
          </div>
          <div class="row">   
          <div class="col-sm-4 form-group">
            <label>Requested By</label>
            <input type="text" name="requestedBy" placeholder="" value="<?php echo $row['requestedby']; ?> " class="form-control" required>
          </div>
          <div class="col-sm-4 form-group">
            <label>Deliver In Charge</label>
            <input type="text" name="deliverInCharge" placeholder="" value="<?php echo $row['deliveryincharge']; ?> " class="form-control" required>
          </div>
          <div class="col-sm-4 form-group">
            <label>Manager</label>
            <input type="text" name="managerName" placeholder="enter manager name" value="<?php echo $row['managername']; ?> " class="form-control" required>
          </div>
          </div>  
          <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info">          
          </div>
        </form> 
        </div>
  </div>
  </div>
  <?php
  //$i++;
      }
  } else {
      echo "<h2>No results Found !<h2>";
  }

?>
</div>
 
    </div>

<div id="menu4" class="tab-pane fade">

<div class="container">
  <?php 
    include "connection.php";
    //$i = 1;
	$id = $_GET['id'];
	$decid = base64_decode($id);	
    $sql = "SELECT *FROM requestdetails1 WHERE is_approved='0' AND userid = '$decid' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      ?>  
          <div class="container">
    <h1 class="col-lg-10 well">Internal Movement Form</h1>
  <div class="col-lg-10 well">
  <div class="row">
        <form name="internalmovemnet" method="post" action="editinternalrequest.php">
          <div class="col-sm-12">
            <div class="row">
            <div class="col-sm-4 form-group">
                <label>User Id</label>
                <input type="text" name="userid" placeholder="" class="form-control" value="<?php echo $row['userid']; ?> ">
              </div>
              <div class="col-sm-4 form-group">
                <label>To</label>
                <input type="text" name="to" placeholder="" class="form-control" value="<?php echo $row['too']; ?> " required>
              </div>
              <div class="col-sm-4 form-group">
                <label>From</label>
                <input type="text" name="from" placeholder="" value="<?php echo $row['fromm']; ?> " class="form-control" required>
              </div>
            </div>          
            <div class="row">
              <div class="col-sm-4 form-group">
                <label>Date</label>
                <input type="text" name="date" placeholder="" value="<?php echo $row['dayte']; ?> " class="form-control" required>
              </div>  
              <div class="col-sm-4 form-group">
                <label>PO Date</label>
                <input type="text" name="podate" placeholder="" value="<?php echo $row['podate']; ?> " class="form-control" required>
              </div>  
              <div class="col-sm-4 form-group">
                <label>Path</label>
                <input type="text" name="path" placeholder="D:\\" value="<?php echo $row['path']; ?> " class="form-control" required>
              </div>    
            </div>
            <div class="row">
              <div class="col-sm-4 form-group">
                <label>Purpose</label>
                <input type="text" name="purpose" placeholder="" value="<?php echo $row['purpose']; ?> " class="form-control" required>
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
                <input type="text" name="description" placeholder="" value="description" class="form-control" required>
              </div>  
              <div class="col-sm-4 form-group">
                <label>Size</label>
                <input type="text" id="size" name="size" placeholder="" value="<?php echo $row['size']; ?> " class="form-control" required>
              </div>  
              <div class="col-sm-4 form-group">
                <label>Total No. Files</label>
                <input type="text" name="n2" id="n2" placeholder="" value="<?php echo $row['numfiles']; ?> " class="form-control" required>
              </div>
              </div>
              <div class="row">
              <div class="col-sm-6 form-group">
                <label>Requested By</label>
                <input type="text" name="requestedby" placeholder="" value="<?php echo $row['requestedby']; ?> " class="form-control" required>
              </div>
              <div class="col-sm-6 form-group">
                <label>Manager</label>
                <input type="text" name="managername" placeholder="" value="<?php echo $row['managername']; ?> " class="form-control" required>
              </div>
            </div>    
              <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info">              
          </div>
        </form> 
        </div>
  </div>
  </div>
  <?php
  //$i++;
      }
  } else {
      echo "<h2>No results Found !<h2>";
  }

?>
</div>
 
    </div>
    </div>
  </div>
</body>
</html>