<?php   session_start();
 require 'bridge.php';
 
$gsession = $query->sSession("session", "sessionstatus");  
$gterm = $query->term();

$letters = $query->selectColsOrder(["name", "title", "term", "session"], "newsletter", "session", "DESC");

if (isset($_POST['submit'])) {
       
        $error = $succ = [];

     if (($query->lookUp("title", "newsletter", ["term"=> $_POST['term'], "session"=>$_POST['session']])) > 0) {
         $error['class'] = "Newsletter for the selected session and term already uploaded.";
     }
      
     if(empty($_FILES['newsletter']['name'])){
                    $error ['newsletter'] = "Please select a newsletter to upload";   
                  }
    if ($_FILES['newsletter']['size'] > 2097152) {  $error ['newsletter'] = "File too large.";  }

     if (empty($error)) 
     {
      $ddate = date("Y-m-d  h:i A");

       $dest = $query->uploadFile("newsletter", "docs/");

      if ($query->dbInsert("newsletter", ["name"=>$dest, "title"=>$_POST['ntitle'], "term"=>$_POST['term'],  "session" => $_POST['session'], "dtime"=>$ddate ])  ) 
      		{
      			echo "<meta http-equiv=\"refresh\" content=\"0;URL=newsletter.php\"";
      	    }
     } 
}

 

require 'view/admin/newsletter.view.php';
        
?>            


