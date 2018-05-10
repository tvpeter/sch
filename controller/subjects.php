<?php 
require '../bridge.php';

$subjects = $query->selectColumn("subject", "subject");   

if (isset($_POST['submit'])) 
{
       
        $error = [];
        
    if (empty($_POST['subject'])) {
       $error['subject'] = "Insert class name";
    }

     if (($query->lookUp("subject", "subject", ["subject"=>$_POST['subject']])) > 0) {
         
         $error['subject'] = "Subject already exist";
     }

     if (empty($error)) {

         if($query->dbInsert("subject", [ "subject" => $_POST['subject'] ]))
         {
              echo "<meta http-equiv=\"refresh\" content=\"0;URL=subjects.php\"";
         }
     } 
}

if (array_key_exists("del", $_POST)) 
{
    foreach ($_POST['delete'] as $id) {

        if($query->deleteRow("subject", ["id" =>$id]))
        {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=subjects.php\"";

        }
                
    }

}

require '../view/admin/subjects.view.php';

?>