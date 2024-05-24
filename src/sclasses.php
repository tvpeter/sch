<?php   session_start();
require 'bridge.php';

if (isset($_GET['stid'])) {
$staffD = $query->selectRow(["id", "name", "signature", "status", "role", "mobile", "em"], "uzerz", ["id"=>$_GET['stid']]);	
extract($staffD);
}

$staffC = $query->selectAndOrder(["id", "class"], "tclasses", ["name"=>$_GET['stid']], "class", "ASC");

$sieved = array_column($staffC, "class");       

$addClasses = $query->selectNotIn(["class"], "class", "class", $sieved);

if (isset($_POST['adds']) && !empty($_POST['rclass'])) {

    foreach ($_POST['rclass'] as $selected) 
    {      
        if ($query->lookUp("id", "tclasses", ["name"=>$staffD['id'], "class"=>$selected]) < 1) 
        {
             $query->dbInsert("tclasses", ["name"=>$staffD['id'], "class"=>$selected]);
        }
 
        }
       header("Refresh:0");   

}


require 'view/admin/sclasses.view.php';
        
?>            

