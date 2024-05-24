<?php    session_start();
require 'bridge.php';

$comments = $query->selectColsOrder(["id", "email", "name", "date"], "feeds", "date", "DESC");
 
if (isset($_GET['email']) && isset($_GET['name']) && isset($_GET['date'])) {
       
       $details = $query->selectRow(["*"], "feeds", ["email"=>$_GET['email'], "name"=>$_GET['name'], "date"=>$_GET['date']]);

    
}


if (array_key_exists("delete", $_POST) && !empty($_POST['del'])) 
{
    foreach ($_POST['del'] as $id) {

        if($query->deleteRow("feeds", ["id" =>$id]))
        {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=comments.php\"";

        }
                
    }

}
 
require 'view/admin/comments.view.php';
        
?>            
