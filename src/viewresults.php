<?php session_start();
require 'bridge.php';

$session = $query->sSession("session", "sessionstatus");
if ($_SESSION['role'] == "staff") {
  $classes = $query->selectAndOrder(["class"], "tclasses", ["name" => $_SESSION['_id_']], "class", "ASC");
} elseif ($_SESSION['role'] == "admin") {
  $classes = $query->selectColumn("class", "class");
}
$gterm = $query->term();

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['term']) && isset($_POST['class'])) {

  $subjectsNumber = $query->selectRow(["subno"], "subjno", ["session" => $_POST['session'], "term" => $_POST['term'], "class" => $_POST['class']]);
  if ($subjectsNumber != null) {
    extract($subjectsNumber);
  } else {
    $subno = 0;
  }

  $resultsDetails = $query->selectResults($_POST['class'], $_POST['session'], $_POST['term']);
}

require 'view/admin/viewresults.view.php';
