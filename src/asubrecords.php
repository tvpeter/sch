<?php session_start();
    require 'bridge.php';

$session = $query->sSession("session", "sessionstatus");
if ($_SESSION['role'] == "staff") {
  $classes = $query->selectAndOrder(["class"], "tclasses", ["name"=>$_SESSION['_id_']], "class", "ASC");
}elseif ($_SESSION['role'] == "admin") {
  $classes = $query->selectColumn("class", "class");
}
$gterm = $query->term();
$subs = $query->selectColumn("subject", "subject");

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['class']) && isset($_POST['subject'])) {

	$subjectRecords = $query->annualSubject($_POST['session'], $_POST['class'], $_POST['subject']);
	
}
    
require 'view/admin/asubrecords.view.php';