<?php   session_start();
require 'bridge.php';

$sessions = $query->selectColsOrder(["id", "session", "status"], "sessionstatus", "session", "DESC");

if (isset($_POST['submit']) && !empty($_POST['sess']) && !empty($_POST['status'])) {   
    $error = []; 
    
     if ($query->lookUp("id", "sessionstatus", ["session"=>$_POST['sess']]) > 0) {
         
         $error['sess'] = "Session already created.";
     }

     if (empty($error)) 
     {
      if ($query->dbInsert("sessionstatus", ["session" => $_POST['sess'], "status"=>$_POST['status']])  ); 
      		header("Refresh:0");
     } 
}


require 'view/admin/session.view.php';
        
?>            


