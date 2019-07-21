<?php session_start();
require_once 'bridge.php';
    //require '../bridge.php';

$session = $query->sSession("session", "sessionstatus");

if ($_SESSION['role'] == "staff") {
	$classes = $query->selectAndOrder(["class"], "tclasses", ["name"=>$_SESSION['_id_']], "class", "ASC");
}elseif ($_SESSION['role'] == "admin") {
	$classes = $query->selectColumn("class", "class");
}

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['class'])) {
    
    $students = $query->selectAndOrder(["name", "admno", "dob", "sex", "address"], "students", ["class"=>$_POST['class'], "session" => $_POST['session']], "name", "ASC");
}
    
require_once 'view/admin/classtudents.view.php';