<?php
$mysqli = new mysqli('localhost', 'root', '', 'ajaxdb');
$serchVal = "";
if (isset($_GET['search'])) 
{
	$serchVal = $_GET['search'];
	$qry = "select * from sampledata where email like '%$serchVal%'";
	$res = $mysqli->query($qry);
	$htmlcode = "";
	$rowCount = mysqli_num_rows($res);
	while ($row = $res->fetch_assoc()) 
	{
		$sid = $row['id'];
		$smail = $row['email'];
		$sphn = $row['cont_no'];
		$scg = $row['cgpa'];

		$htmlcode .= "<tr><td>$sid</td><td>$smail</td>".
		"<td>$sphn</td><td>$scg</td><td>".
		"<input type='button' value='Delete'></td></tr>"; 

	}
	echo $htmlcode;
	if ($rowCount==0) 
	{

		echo "<tr><td colspan='5'>No Data Exits</td></tr>";
	} 
}
?>