<?php session_start();

  require_once 'bridge.php';

$gsession = $query->sSession("session", "sessionstatus");

if (isset($_POST['check'])) {

    $students = $query->selectAndOrder(["*"], "students", ["session" => $_POST['session']], "name", "ASC");

}


require_once 'view/admin/allstudents.view.php';