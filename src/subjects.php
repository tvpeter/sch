<?php session_start();
require_once 'bridge.php';

$subjects = $query->selectColumn("subject", "subject");   

if (isset($_POST['submit']) && !empty($_POST['subject'])) 
{
       
        $error = [];
        
    if (empty($_POST['subject'])) {
       $error['subject'] = "Insert class name";
    }

     if (($query->lookUp("subject", "subject", ["subject"=>$_POST['subject']])) > 0) {
         
         $error['subject'] = "Subject already exist";
     }

     if (empty($error)) {
        $query->dbInsert("subject", [ "subject" => $_POST['subject'] ]);
            $_POST['subject'] = "";  header("Refresh:0");
        
     } 
}

if (array_key_exists("del", $_POST) && !empty($_POST['delete'])) 
{
    foreach ($_POST['delete'] as $id) {

        if($query->deleteRow("subject", ["subject" =>$id]))
        {
            header("Refresh:0");
        }        
    }
}

require_once 'view/admin/subjects.view.php';

?>