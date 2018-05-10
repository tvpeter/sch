<?php 

    require '../bridge.php';

$session = $query->sSession();
$classes = $query->selectColumn("class", "class");

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['class'])) {
    
    $students = $query->selectAndOrder(["name", "admno", "dob", "sex", "address"], "students", ["class"=>$_POST['class'], "session" => $_POST['session']], "name", "ASC");

}
    
require '../view/admin/classtudents.view.php';