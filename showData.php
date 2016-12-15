<?php
session_start();
include("Connection.php");
if (isset($_POST['s1'])) {
	
    $s1=$_POST['s1'];
   
    $res=mysql_query("SELECT * FROM review WHERE HOTEL='$s1'");
    $rows = array();
     	while($r = mysql_fetch_assoc($res)){   
     			$rows[] = $r;
     			}
    	 echo json_encode($rows);
}
		
    
?>