<!DOCTYPE html>
<html>
<head>
	<title>Chat Box</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		*
		{
			box-sizing: border-box;
		}
		.row::after
		{
			content: "";
			clear: both;
			display: table;
		}

		/* For mobile phones: */	
		[class*="col-"] {
			width: 100%;
		}
		.caret
		{
			background-color: #acf;
			padding: 5px;
			margin: 5px;
			border: 2px solid grey;
			height: 450px;
		}
		.header
		{
			font-size: 16px;
			font-weight: 2;
			margin-left: 1em;
		}
		.box
		{
			padding: 2px;
			overflow-y: auto;
			height: 300px;
		}
		.main
		{
			padding: 5px 5px 5px 15px;
			margin: 10px;
			background-color: white;
			border-radius: 2%;
		}
		.field
		{
			padding: 5px;
		}

		@media only screen and (min-width: 600px) {
			/* For tablets: */
			.col-s-1 {width: 8.33%;}
			.col-s-2 {width: 16.66%;}
			.col-s-3 {width: 25%;}
			.col-s-4 {width: 33.33%;}
			.col-s-5 {width: 41.66%;}
			.col-s-6 {width: 50%;}
			.col-s-7 {width: 58.33%;}
			.col-s-8 {width: 66.66%;}
			.col-s-9 {width: 75%;}
			.col-s-10 {width: 83.33%;}
			.col-s-11 {width: 91.66%;}
			.col-s-12 {width: 100%;}
		}
		@media only screen and (min-width: 768px) {
			/* For desktop: */
			.col-1 {width: 8.33%;}
			.col-2 {width: 16.66%;}
			.col-3 {width: 25%;}
			.col-4 {width: 33.33%;}
			.col-5 {width: 41.66%;}
			.col-6 {width: 50%;}
			.col-7 {width: 58.33%;}
			.col-8 {width: 66.66%;}
			.col-9 {width: 75%;}
			.col-10 {width: 83.33%;}
			.col-11 {width: 91.66%;}
			.col-12 {width: 100%;}
		}
	</style>
</head>
<body>
	<!-- <center> -->
		<div class="row">
			<div class="col-6 col-s-12">
				<div class="caret" id="caret">
					<div class="header">
						<h2>Chat Box</h2>
					</div>
					<hr>
					<div class="box">
					<?php
					    $mysqli = new mysqli('localhost', 'root', '', 'chatdb') or die("Error connection");

                         $res = $mysqli->query("SELECT * FROM `chatting`");
                         while ($row = $res->fetch_assoc()) 
                         {
                         	$user = $row['Name'];
                         	$message = $row['Message'];
                         	?>
                             <div class="main">
							<p><strong><?php echo $user;?> : </strong><?php echo $message;?></p>
						    </div>
                         	<?php  
                         }
					?>
						
						
					</div>
                 </div>

				<div class="field"> 
					<form method="" action="">
						<div>
							<input type="text" id="name" placeholder="Enter you name here .. " style="width: 100%; background-color: #d2e0e0;">
						</div>
						<br>
						<div>
							<textarea id="msg" style="width: 100%; background-color: #d2e0e0;" placeholder="Enter your message here .."></textarea>
						</div>
						<button type="submit" id="submit" style="width: 100%; height: 5%; background-color: #4dffa6;" onclick="gotoAjax()" ><b>Send</b></button>
					</form> 	
				</div> 
			</div>
		</div>	
		<!-- </center> -->
		<script type="text/javascript">
			function gotoAjax()
			{
				var uname = document.getElementById("name").value; 
				var umsg = document.getElementById("msg").value;

				var req = new XMLHttpRequest();
				req.onreadystatechange = function()
				{
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("caret").innerHTML = this.responseText;
					}
				}
				req.open("GET", "insert.php?name=" + uname + "&msg=" + umsg);
				req.send();
			}
		</script>
	</body>
	</html>