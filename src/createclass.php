<?php   session_start();
 require_once 'bridge.php';

$classes = $query->selectColumn("class", "class");   

if (isset($_POST['submit']) && isset($_POST['cname'])) {
       
        $error = [];
        
    if (empty($_POST['cname'])) {
       $error['cname'] = "Insert class name";
    }

     if (($query->lookUp("class", "class", ["class"=>$_POST['cname']])) > 0) {
         
         $error['cname'] = "Class already exist";
     }

     if (empty($error)) {

         $query->dbInsert("class", [ "class" => strtoupper($_POST['cname']) ]);
             $_POST['cname'] = ""; 
              header('Refresh:0');
         
     } 
}

if (array_key_exists("del", $_POST) && !empty($_POST['delete'])) {
    

    foreach ($_POST['delete'] as $id) {

        if($query->deleteRow("class", ["class"=>$id]))
        {
            header("Refresh:0;");

        }
                
    }

}

require_once 'view/admin/createclass.view.php';
        
?>            


