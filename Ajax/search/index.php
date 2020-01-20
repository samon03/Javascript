<?php
$mysqli = new mysqli('localhost', 'root', '', 'ajaxdb');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Values</title>
	<style type="text/css">
		*
		{
			box-sizing: border-box;
		}
		table
		{
			width: 100%;
			text-align: center;
			margin-top: 15px;
		}
		table, th, td
		{
			border: 1px solid black;
			border-collapse: collapse;
		}
		input
		{
			padding: 2px;
		}
	</style>
	
</head>
<body>
	Search : <input type="text" id="search" placeholder="Enter a value" onkeyup="searchFunc();">
	<table id="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Cgpa</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="tbody">

			<?php
			$qry = "SELECT * FROM `sampledata`";
			$res = $mysqli->query($qry);
			$rowCount = mysqli_num_rows($res);
			while ($row = $res->fetch_assoc()) 
			{
                $sid = $row['id'];
                $smail = $row['email'];
                $sphn = $row['cont_no'];
                $scg = $row['cgpa'];
				?>
				<tr>
					<td><?php echo $sid;?></td>
					<td><?php echo $smail;?></td>
					<td><?php echo $sphn;?></td>
					<td><?php echo $scg;?></td>
					<td><input type="submit" name="delBtn" value="Delete" onclick="deleteFunc(<?php echo $sid; ?>)"></td>
				</tr>	
				<?php
			}
			if ($rowCount == 0) 
			{
				?>
				<tr>
					<td colspan="5">No Data Exits</td>
			    </tr>
			    <?php
			}
			?>
		</tbody>
	</table>
	<script type="text/javascript">
		function searchFunc()
		{
			var serVal = document.getElementById("search").value;

			var req = new XMLHttpRequest();
			req.onreadystatechange = function()
			{
				if (this.readyState == 4 && this.status == 200) 
				{
					document.getElementById("tbody").innerHTML = req.responseText;
				}
			}
			req.open("GET", "search.php?search=" + serVal);
			req.send();

		}
	    function deleteFunc(id)
		{
            var req = new XMLHttpRequest();
            req.onreadystatechange = function()
            {
            	if(this.readyState == 4 && this.status == 200) 
            	{
                     document.getElementById("tbody").innerHTML = req.responseText;
            	}
            }
            req.open("GET", "delete.php?id=" + id, true);
            req.send();
		}
	</script>
</body>
</html>