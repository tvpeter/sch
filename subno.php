<?php   session_start();
require 'bridge.php';
if ($_SESSION['role'] == "staff") {
  $classes = $query->selectAndOrder(["class"], "tclasses", ["name"=>$_SESSION['_id_']], "class", "ASC");
}elseif ($_SESSION['role'] == "admin") {
  $classes = $query->selectColumn("class", "class");
}
$gsession = $query->sSession("session", "sessionstatus");  
$edsession = $query->editableSession(["session"], "sessionstatus", ["status"=>"editable"], "session", "ASC");
$gterm = $query->term();

if (isset($_POST['submit'])) {
       
        $error = $succ = [];
        
    if (empty($_POST['class'])) {
       $error['class'] = "select class";
    }
     if (empty($_POST['session'])) {
       $error['session'] = "select session";
    }
    if (empty($_POST['term'])) {
       $error['term'] = "select term";
    }
    if (empty($_POST['tsubjects'])) {
       $error['tsubjects'] = "Insert number of subjects";
    }

     if (($query->lookUp("subno", "subjno", ["class"=>$_POST['class'], "session"=>$_POST['session'],
 		"term"=> $_POST['term']])) > 0) {
         
         $error['class'] = "subjects number already set for this class";
     }

     if (empty($error)) 
     {
      if ($query->dbInsert("subjno", ["class" => $_POST['class'], "session"=>$_POST['session'], "term"=>$_POST['term'], "subno"=>$_POST['tsubjects'] ])  ) 
      		{
      			$succ['insert'] = "Inserted successfully";
      	    }
     } 
}

if (isset($_POST['checksub']) && !empty($_POST['checkgs']) && !empty($_POST['checkterm']) ) 
	{
		$session = $_POST['checkgs']; $term = $_POST["checkterm"];
	
	}else{
		$session=(date("Y")-1)."/".date("Y"); $term = "Term I";
	}

	$setclasses = $query->selectAndOrder(["sn", "class", "subno"], "subjno", [
			"session"=>$session, "term"=>$term], "class", "ASC");


require 'view/admin/subno.view.php';
        
?>            


