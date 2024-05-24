<?php    session_start();
require 'bridge.php';
 
$gsession = $query->editableSession(["session"], "sessionstatus", ["status"=>"editable"], "session", "ASC");
$nsession = $query->sSession("session", "sessionstatus"); 
$gterm = $query->term();

if (isset($_POST['submit'])) {
       
        $error = $succ = [];

     if (($query->lookUp("nextterm", "control", ["session"=>$_POST['session'], "term"=> $_POST['term']])) > 0) {
         
         $error['class'] = "Information already set for this term. Select on the view section to update";
     }

     if (empty($error)) 
     {
      if ($query->dbInsert("control", ["session" => $_POST['session'], "term"=>$_POST['term'], "termst"=>$_POST['tstarted'], "terme"=>$_POST['tended'], "nextterm"=>$_POST['nextterm'] ])  ) 
      		{
      			$succ['insert'] = "Inserted successfully";
      	    }
     } 
}

if (isset($_POST['check']) && !empty($_POST['gsession']) && !empty($_POST['gterm']) ) 
	{
    $termDetails = $query->selectRow(["termst", "terme", "nextterm"], "control", ["session"=>$_POST['gsession'], "term"=>$_POST['gterm']]);		
	
	}

require 'view/admin/terminfo.view.php';
        
?>            


