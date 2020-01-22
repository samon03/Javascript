<?php
session_start();
$id = $_SESSION['id'];

$conn = new mysqli('localhost', 'root', '', 'logindb');
$qry = "SELECT uname FROM `user` WHERE uid = '$id'";
$res = $conn->query($qry);
$fetch = mysqli_fetch_assoc($res);
$name = $fetch['uname'];

echo "Welcome, " . $name;
?>