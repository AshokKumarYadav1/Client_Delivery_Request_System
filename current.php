<?php include "header.php"; ?>
<?php 
session_start();
if (isset($_SESSION['id'])) {
	?>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php"><img class="img-responsive" width="90%" src="./images/logo.png" alt="MapMyIndia"></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    	<li>
    		<h3 style="color:yellow;"> Welcome User <?php echo $_SESSION['id']; ?></h3>
    	</li>
			<li>
				<a href="./logout.php"><button type="button" class="btn btn-info">LogOut</button></a>
			</li>
    </ul>
  </div>
</nav>
<div class="container">
	<?php 
		include "connection.php";
		$sql = "SELECT *FROM requestdetails WHERE  managername='lakscnhal' AND is_approved='0' ";
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