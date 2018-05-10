<?php

require '../bridge.php';


if (isset($_GET['id']) && isset($_GET['session'])) {
	
        if(($query->deleteRow("results", ["admno"=>$_GET['id'], "session"=>$_GET['session']])) && ($query->deleteRow("scores", ["admno"=>$_GET['id'], "session"=>$_GET['session']])) && ($query->deleteRow("students", ["admno"=>$_GET['id'], "session"=>$_GET['session']]))) 
        {
            //echo "<meta http-equiv=\"refresh\" content=\"0;URL=allstudents.php\"";
            header("location:allstudents.php");
        }
                
        header("location:allstudents.php");
}

	if (isset($_GET['sbn'])) 
	{
		if ($query->deleteRow("subjno", ["sn"=>$_GET['sbn']])) {
			header("location:subno.php");
		}

	}