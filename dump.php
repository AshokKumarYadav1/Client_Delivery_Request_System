<?php
$id = $_GET['id'];
$encid = base64_encode($id);
header("location: index.php?id=".$encid); 
//header("location: http://10.1.1.66:8080/mmiportal/index.jsp?a=".$encid);
?>
<html>
<head>
<title>Dump page</title>
</head>
<body></body>
</html>