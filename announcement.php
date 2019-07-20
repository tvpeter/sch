<?php    session_start();
require 'bridge.php';

$anns = $query->selectColsOrder(["id", "topic", "postime"], "announcements", "postime", "DESC");

if (isset($_POST['submit'])) {
       
        $error = [];

     if (($query->lookUp("postime", "announcements", ["topic"=> $_POST['title']])) > 0) {
         $error['fd'] = "Announcement already posted";
     }

     if (empty($error)) 
     {
      $ddate = date("Y-m-d  h:i A");

      $query->dbInsert("announcements", ["topic"=>$_POST['title'], "body"=>$_POST['anndetails'], "postime"=>$ddate]);
      header("Refresh:0");   
      		
     } 
}

if (array_key_exists("delete", $_POST) && !empty($_POST['del'])) 
{
    foreach ($_POST['del'] as $id) {

        if($query->deleteRow("announcements", ["id" =>$id]))
        {
            header("Refresh:0"); 
        }
                
    }

}
 

require 'view/admin/announcement.view.php';
        
?>            
