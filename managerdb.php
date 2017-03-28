<?php include "connection.php"; ?>
<?php
session_start();
    $id = $_POST['id'];
    $pass = $_POST['password'];
    $sql="SELECT * FROM manager WHERE userid='$id' AND password='$pass' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $managername= $row['managername'];

            $_SESSION['id'] = $managername;
            $_SESSION['userid'] = $id;

            header('Location: managerdashboard.php');
    }
    else{
        include "error.php";
    }
?>