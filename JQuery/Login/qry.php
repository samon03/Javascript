<?php

$name = $_POST["uname"];
$pass = $_POST["upass"];

$conn = new mysqli('localhost', 'root', '', 'logindb');
$qry = "SELECT * FROM `user` WHERE uname = '$name' && upass = '$pass'";
$res = $conn->query($qry);
$count = mysqli_num_rows($res);
$fetch = mysqli_fetch_assoc($res);
$id = $fetch['uid'];

if (!$name && !$pass) 
{
	echo "All fields required!";
}
else
{
	if (!$name) 
	{
		echo "Name field required!";
	}
	else
	{
		if (!$pass) 
		{
			echo "Password field required!";
		}
		else
		{
			if ($count == 0) 
			{
				echo "Incorrect Credentials";
			}
			else
			{
				session_start();
				$_SESSION['id'] = $id;
				echo "<script>window.location.assign('home.php')</script>";
			}
            

		}
	}

}
?>