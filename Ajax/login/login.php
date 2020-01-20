<?php
   
   $mysqli = new mysqli("localhost", "root", "", "logindb") or die("Error connection");
   
   if(isset($_POST["logBtn"]))
   {
       $uname = $_POST["name"];
       $upass = $_POST["pass"];

       $result = $mysqli->query("SELECT * FROM `user` WHERE uname = '$uname' AND upass = '$upass' LIMIT 1");

       if(mysqli_num_rows($result) == 1) 
       {
           echo "<script>window.location.assign('https://www.w3schools.com/colors/colors_picker.asp')</script>";
       }
       echo "<script>loginFunc();</script>";
       
       // $mysqli->query("INSERT INTO `user` VALUES ('', '$uname', '$upass')");
      
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>CSS Practic</title>
	<link rel="stylesheet" type="text/css" href="my.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <!-- <ul class="nav">
   	<li><a href="#">Home</a></li>
   	<li><a href="group.html">Group</a></li>
   	<li><a href="in.html">Review</a></li>
   	<li><a href="#">Login</a></li>
   	<li><a href="#">Register</a></li>
   </ul> -->
  
   <center>
   <form method="POST" action="login.php">
   <table style="width: 50%; background-color: tomato; text-align: center; height: 400px; table-layout: inherit;">
   	<div>
   		<h1 style=" width: 50%; font-weight: bold; background-color: #ff8080; padding: 10px; margin-bottom: 0px;">Log In</h1>
   	</div>
   	<tbody>
   		<tr>
   			<td style=" font-size: 26px; font-weight: bold;">
   				Name :
   			</td>
   			<td>
   				<input type="text" name="name" id="name">
   			</td>
   		</tr>
   		<tr>
   			<td style=" font-size: 26px; font-weight: bold;">
   				Password :
   			</td>
   			<td>
   				<input type="password" name="pass" id="pass">
   			</td>
   		</tr>
   		<tr>
   			<td colspan="2">
   			   <input type="submit" name="logBtn" value="Log In" class="danger">
   			  <!--  <p>Logged In</p> -->
   			</td>
   		</tr>
   	</tbody>
   </table>
   </form>
   </center>
   <script type="text/javascript">
   	  function loginFunc()
   	  {
   	  	  var name = document.getElementById("name").value;
   	  	  var pass = document.getElementById("pass").value;

   	  	  var req = new XMLHttpRequest();
   	  	  req.onreadystatechange = function()
   	  	  {
   	  	  	   if (this.readyState == 4 && this.status == 200) 
   	  	  	   {
   	  	  	   	   document.getElementById("demo").innerHTML = responseText;
   	  	  	   }
   	  	  }
   	  	  req.open("POST", "login.php", true);
   	  	  req.send();
   	  }


   </script>
</body>
</html>