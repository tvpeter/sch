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
        
     if ($query->lookUp("tuition", "fees", ["session"=>$_POST['session'], "term"=>$_POST['term'], "section"=>$_POST['section']]) > 0) {
        $error['failure'] = "Fees for this term and section has already been set. Use the view section to delete and reset if there is any mistake";
     };
    
     if (empty($error)) 
     {
      if ($query->dbInsert("fees", ["session" => $_POST['session'], "term"=>$_POST['term'], "tuition"=>$_POST['tuition'], "dev"=>$_POST['dlevy'], "medical"=>$_POST['mlevy'], "exams"=>$_POST['exams'], "pta"=>$_POST['pta'], "lesson"=>$_POST['elessons'], "utility"=>$_POST['utility'], "cathe"=>$_POST['cath'], "sports"=>$_POST['sports'], "dvd"=>$_POST['dvd'], "idcard"=>$_POST['idcard'], "locker"=>$_POST['locker'], "cbooklet"=>$_POST['cabooklet'], "edulevy"=>$_POST['elevy'], "party"=>$_POST['cparty'], "section"=>$_POST['section']])) 
      		{
      			$msg = "Fees has been set successfully";
            
            header("location:fees.php?msg=$msg");

      	    }
     } 
}

if (array_key_exists("check", $_POST) && isset($_POST['gsession']) && isset($_POST['gterm']) && isset($_POST['sectn']))
	{
		  
    $feeDetails = $query->selectRow(["*"], "fees", ["session"=>$_POST['gsession'], "term"=>$_POST['gterm'],  "section"=>$_POST['sectn']]);
  }

  

require 'view/admin/fees.view.php';
        
?>            


