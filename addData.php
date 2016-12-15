<?php
session_start();
include("Connection.php");
if (isset($_POST['r'])) {
	
    $s1=$_POST['s1'];
    $s2=$_POST['s2'];
    $r=$_POST['r'];
    $e=$_POST['e'];

    mysql_query("INSERT INTO `areahop`.`review` (`RID`, `HOTEL`, `REVIEW`, `STARS`, `DATE`, `EMAIL`) VALUES (NULL, '$s1', '$r', $s2,now(),'$e')");
    $res=mysql_query("SELECT * FROM review");
    $rows = array();
     	while($r = mysql_fetch_assoc($res)){   
     			$rows[] = $r;
     			}
    	 echo json_encode($rows);
}
		
    
?>