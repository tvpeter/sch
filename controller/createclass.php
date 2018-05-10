<?php    //require '../bridge.php';
require './index.php';

$classes = $query->selectColumn("class", "class");   

if (isset($_POST['submit'])) {
       
        $error = [];
        
    if (empty($_POST['cname'])) {
       $error['cname'] = "Insert class name";
    }

     if (($query->lookUp("class", "class", ["class"=>$_POST['cname']])) > 0) {
         
         $error['cname'] = "Class already exist";
     }

     if (empty($error)) {

         if($query->dbInsert("class", [ "class" => strtoupper($_POST['cname']) ]))
         {
              echo "<meta http-equiv=\"refresh\" content=\"0;URL=createclass.php\"";
         }
     } 
}

if (array_key_exists("del", $_POST)) {
    

    foreach ($_POST['delete'] as $id) {

        if($query->deleteRow("class", ["class"=>$id]))
        {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=createclass.php\"";

        }
                
    }

}

require '../view/admin/createclass.view.php';
        
?>            


