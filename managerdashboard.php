<?php include "header.php"; ?>
<?php include "connection.php"; ?>
<?php 
session_start();
if (isset($_SESSION['id'])) {
	?>

  <!DOCTYPE html>
<html>
<head>
    <title></title>
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
			
			$(document).ready(function () {
                
                $('#dp3').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#dp4').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
   

        function update(val){
            //alert(val);
            $.ajax({
                    type : 'POST',
                    url : 'is_approved.php',
                    data : {mn :val},
                    success : function(data){
                        alert('Updated');
                        //location.reload();
                    }
            });
        }

        function update1(val){
            //alert(val);
            $.ajax({
                    type : 'POST',
                    url : 'is_approved1.php',
                    data : {mn :val},
                    success : function(data){
                        alert('Updated');
                        //location.reload();
                    }
            });
        }
    
    
    </script>
</head>
	<body>

<nav class="navbar navbar-inverse" role="navigation" style="border-radius: 4px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img class="img-responsive" width="90%" src="./img/logo.png" alt="MapMyIndia"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    	<li>
    		<h3 style="color:yellow;margin: 20px;"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['userid']; ?></h3>
    	</li>
			<li>
				<a href="./logout.php?id=<?php echo $_SESSION['userid']?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-off"></span>  LogOut</button></a>
			</li>
    </ul>
  </div>
</nav>
<div class="container">
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#current">Current Client Request</a></li>
    <li><a data-toggle="tab" href="#menu1">See Client Done Work</a></li>
    <li><a data-toggle="tab" href="#menu2">Client Work on Hold</a></li>
    <li><a data-toggle="tab" href="#menu3">Current Internal request</a></li>
    <li><a data-toggle="tab" href="#menu4">See Internal Work Done</a></li>
    <li><a data-toggle="tab" href="#menu5">Internal Work on Hold</a></li>
  </ul>

  <div class="tab-content">
    <div id="current" class="tab-pane fade">
      <?php
      if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    session_start();
    include "connection.php";
    $id = $_SESSION['id'];
    //static $i = 1; 
    $sql = "SELECT * FROM managerrepo WHERE  managername= '".$id."' AND is_approved='0' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $_SESSION['abc'] = $row['id']; //Update value with id

      ?>  <!--<form action='is_approved.php' method='post'>-->
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
        <th>Confirm</th>
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
        <td><input type="checkbox" onchange="update(this.value);" value ="<?php echo $_SESSION['abc'];?>"/></td>
      </tr>
    </tbody>
  </table>
  <!--</form>-->
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
}
else{
  include "error.php";

}
?>
    </div>

    <!--Client Done Work-->
    <div id="menu1" class="tab-pane fade">

     <h2></h2>
      <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
              <label for="from" class="col-sm-1 control-label">From :</label>
              <div class="col-sm-2">
                  <input type="text"  name="from" id="dp1"  class="form-control"  placeholder="Date like: 2017-02-23">
              </div>
          
              <label for="to" class="col-sm-1 control-label">To :</label>
              <div class="col-sm-2">
                  <input type="text"  name="to" id="dp2"  class="form-control"  placeholder="Date like: 2017-02-23">
              </div>
                  <div class="col-sm-2 col-sm-offset-1">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
            </div>     
      </form>

      <?php
      if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    if (isset($_POST['submit'])) {
              $from = $_POST['from'];
              $to = $_POST['to'];
			  //session_start();
              include "connection.php";
			  $id = $_SESSION['id'];              
              $sql = "SELECT *FROM managerrepo WHERE dayte BETWEEN '$from' AND '$to' AND status='2' AND managername= '".$id."' ";
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
                 }
          
              }    

          }

?>
</div>
  <?php
}
else{
  include "error.php";

}
?>
    </div>

    <!--Client Hold Operation-->
    <div id="menu2" class="tab-pane fade">
      <?php
      if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    include "connection.php";
    //$i = 1;
	$id = $_SESSION['id'];	
    $sql = "SELECT *FROM managerrepo WHERE is_approved='1' AND status='5' AND managername= '".$id."' ";
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
}
else{
  include "error.php";

}
?>
    </div>

     <!--Current internal Movement Request-->
     <div id="menu3" class="tab-pane fade">
      <?php
      if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    include "connection.php";
     $id = $_SESSION['id'];
    //$i = 1; 
    $sql = "SELECT * FROM managerrepo1 WHERE  managername= '".$id."' AND is_approved='0' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $_SESSION['abc'] = $row['id']; //Update value with id

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
        <th>Confirm</th>
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
        <td><input type="checkbox" onchange="update1(this.value);" value ="<?php echo $_SESSION['abc'];?>"/></td>
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
}
else{
  include "error.php";

}
?>
    </div>

    <!--Internal Done Work-->
    <div id="menu4" class="tab-pane fade">
    <h2></h2>
      <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
              <label for="from" class="col-sm-1 control-label">From :</label>
              <div class="col-sm-2">
                  <input type="text"  name="from" id="dp3"  class="form-control"  placeholder="Date like: 2017-02-23">
              </div>
          
              <label for="to" class="col-sm-1 control-label">To :</label>
              <div class="col-sm-2">
                  <input type="text"  name="to" dp="dp4"  class="form-control"  placeholder="Date like: 2017-02-23">
              </div>
                  <div class="col-sm-2 col-sm-offset-1">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
            </div>     
      </form>
      <?php
      if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    if (isset($_POST['submit'])) {
              $from = $_POST['from'];
              $to = $_POST['to'];

              include "connection.php";
			  $id = $_SESSION['id'];
              
              $sql = "SELECT *FROM managerrepo1 WHERE dayte BETWEEN '$from' AND '$to' AND status='2' AND managername= '".$id."' ";
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
                 }
          
              }    

          }

?>
</div>
  <?php
}
else{
  include "error.php";

}
?>
    </div>

     <!--Internal Hold Operation-->
    <div id="menu5" class="tab-pane fade">
      <?php
      if (isset($_SESSION['id'])) {
  ?>

<div class="container">
  <?php 
    include "connection.php";
	$id = $_SESSION['id'];
    //$i = 1; 
    $sql = "SELECT *FROM managerrepo1 WHERE is_approved='1' AND status='5' AND managername= '".$id."' ";
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
}
else{
  include "error.php";

}
?>
    </div>
    </div>
  </div>
</div>
<?php
}
else{
	include "error.php";
}
?>
</body>
</html>
