<?php 
   include "connection.php";
    session_start();
	$id = $_GET['id'];
	$decid = base64_decode($id);
	//echo $decid;
	$_SESSION['empid'] = $id;
	//echo $id;
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Client Request Delivery System</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.mini.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.mini.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    $(function(){
       $("#page1").click(function(){
        $('#result').load('./requestform.php?id=<?php echo $_SESSION['empid']?>');
         //alert("Thanks for visiting!");
       }); 

       $("#page2").click(function(){
        $('#result').load('./internalform.php?id=<?php echo $_SESSION['empid']?>');
         //alert("Thanks for visiting!");
       });
     });
</script>
<body>
<nav class="navbar-inverse" role="navigation" style="border-radius: 4px;">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
      			<a class="navbar-brand" href="./index.php?id=<?php echo $_SESSION['empid']?>"><img src="img/logo.png" style="height: 30px;"></a>
    	</div>

    	<!-- Collect the nav links, forms, and other content for toggling -->
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav">
            <li><a id="page1" href="#">Delivery Request</a></li>
            <li><a id="page2" href="#">Internal Movement</a></li>
            <li><a id="page3" href="./requeststatus.php?id=<?php echo $_SESSION['empid']?>">Request Status</a></li>
			<li><a id="page4" href="http://10.1.1.66:8080/mmiportal/index.jsp?a=<?php echo base64_decode($_GET['id']); ?>">Portal</a></li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
        		<li><p class="navbar-text">Already have an account?</p></li>
        		<li>
        			<a href="./managerlogin.php?id=<?php echo $_SESSION['empid']?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span><b> Manager Login</b></button></a>
        		</li>
        		<li class="dropdown">
         			<a href="./userlogin.php?id=<?php echo $_SESSION['empid']?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span><b> Admin Login</b></button></a>	
        		</li>
      		</ul>
    	</div><!-- /.navbar-collapse -->
  	</div><!-- /.container-fluid -->
</nav>
<div id="result">
</div>
</body>
</html>