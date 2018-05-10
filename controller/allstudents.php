<?php 

    require '../bridge.php';

$session = $query->sSession();

if (isset($_POST['check'])) {
    $select = $_POST['session'];
}else {
    $select = (date("Y")-1)."/".date("Y");
}
    $students = $query->selectAndOrder(["*"], "students", ["session" => $select], "name", "ASC");

require '../view/admin/allstudents.view.php';