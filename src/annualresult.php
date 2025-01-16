<?php session_start();
require 'bridge.php';

$session = $query->sSession("session", "sessionstatus");
if ($_SESSION['role'] == "staff") {
  $classes = $query->selectAndOrder(["class"], "tclasses", ["name" => $_SESSION['_id_']], "class", "ASC");
} elseif ($_SESSION['role'] == "admin") {
  $classes = $query->selectColumn("class", "class");
}

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['class'])) {

  $anresult = $query->annualResults($_POST['class'], $_POST['session']);
}


require 'view/admin/annualresult.view.php';
