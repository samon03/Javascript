<?php  
    $mysqli = new mysqli('localhost', 'root', '', 'chatdb') or die("Error connection");
    $uname = "";
    $umsg = "";
    if (isset($_GET['name']) && isset($_GET['msg'])) 
    {
    	$uname = $_GET['name'];
    	$umsg = $_GET['msg'];
    	$mysqli->query("INSERT INTO `chatting` VALUES ('', '$uname', '$umsg')");
    }

?>