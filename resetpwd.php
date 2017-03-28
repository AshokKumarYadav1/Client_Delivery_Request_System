<?php 
   include "connection.php";
    
    if(isset($_POST['submit']))
    {
        $userid = $_POST['userid'];
        $newpwd = $_POST['newpwd'];

        $sql = "UPDATE `manager` SET `password` ='$newpwd' WHERE `userid` = '$userid' ; ";
        
        if($conn->multi_query($sql) === TRUE)
        {
            echo "You have requested successfully!";    
            unset($_POST);
            header("location: userdashboard.php");
        } 
        else 
        {
            echo "Problem in request. Try Again!";  
        }
    }

?>

<head>
  <style>
    .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
  </style>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.mini.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.mini.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" style="height: 64px;">
  <div class="container-fluid">
    <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="./userdashboard.php"><img src="img/logo.png" style="height: 30px; margin-left: 15px;"></a>
        </div>

   </div>
  </nav>  
  
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Reset Password</h1>
            <div class="account-wall">
                <img class="profile-img" src="img/user.png" alt="">
                
                <form class="form-signin" action="" method="POST">
                <div>
                <input type="text" class="form-control" name="userid" placeholder="Enter manager ID" required autofocus>
                </div>
                <div>
                <input type="text" class="form-control" name="newpwd" placeholder="New Password" required autofocus>
                </div>
                <div>
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Reset">
                </div>                    
                </form>
            </div>
        </div>
    </div>
  </div>  

</body>
