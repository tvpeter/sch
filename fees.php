<?php    session_start();
require 'bridge.php';

$gsession = $query->sSession("session", "sessionstatus");  
$edsession = $query->editableSession(["session"], "sessionstatus", ["status"=>"editable"], "session", "ASC");

$gterm = $query->term();

$msg = "";

if (isset($_POST['submit'])) {
       
        $error = []; 

    if (empty($_POST['session'])) {
       $error['session'] = "select session";
      }
    if (empty($_POST['term'])) {
       $error['term'] = "select term";
      }
      if (empty($_POST['section'])) {
       $error['section'] = "select section";
      }
        
     if ($query->lookUp("tuition", "newfees", ["session"=>$_POST['session'], "term"=>$_POST['term'], "section"=>$_POST['section']]) > 0) {
        $error['failure'] = "Fees for this term and section has already been set";
     };
    
     if (empty($error)) 
     {
      if ($query->dbInsert("newfees", ["session" => $_POST['session'], "term"=>$_POST['term'], "section"=>$_POST['section'], "pib"=>$_POST['pib'], "pis"=>$_POST['pis']])) 
      		{
      			$msg = "Fees has been set successfully";
            header("location:fees.php?msg=$msg");
      	    }
     } 
}

if (array_key_exists("check", $_POST) && isset($_POST['gsession']) && isset($_POST['gterm']) && isset($_POST['sectn']))
	{
		  
    $feeDetails = $query->selectRow(["session", "term", "pib", "pis"], "newfees", ["session"=>$_POST['gsession'], "term"=>$_POST['gterm'],  "section"=>$_POST['sectn']]);
  }

  
require 'view/admin/fees.view.php';
        
?>            


