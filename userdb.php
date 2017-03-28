<?php include "connection.php"; ?>
<?php
session_start();
    $id = $_POST['id'];
    $pass = $_POST['password'];
    $sql="SELECT * FROM user WHERE id='$id' AND password='$pass' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
            $_SESSION['id'] = $id;
            header('Location: userdashboard.php');
    }
    else{
        include "error.php";
    }
?>