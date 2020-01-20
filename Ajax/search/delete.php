<?php
    $mysqli = new mysqli('localhost', 'root', '', 'ajaxdb');
    $delValue = "";
    if (isset($_GET["id"]))
    {
    	$delValue = $_GET["id"];
    	$qry = "DELETE FROM `sampledata` WHERE id = $delValue";
    	$mysqli->query($qry);

    	$htmlcode = "";
        $qry = "SELECT * FROM `sampledata`";
         $res = $mysqli->query($qry);
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