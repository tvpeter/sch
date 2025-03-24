<?php session_start();
require 'bridge.php';

$session = $query->sSession("session", "sessionstatus");
//$session = $query->editableSession(["session"], "sessionstatus", "session", "DESC");

if ($_SESSION['role'] == "staff") {
	$classes = $query->selectAndOrder(
		["class"],
		"tclasses",
		["name" => $_SESSION['_id_']],
		"class",
		"ASC"
	);
} elseif ($_SESSION['role'] == "admin") {
	$classes = $query->selectColumn("class", "class");
}
$gterm = $query->term();
$subs = $query->selectColumn("subject", "subject");

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['term']) && isset($_POST['class']) && isset($_POST['subject'])) {

	$subjectStats = $query->subjectStats(
		$_POST['class'],
		$_POST['session'],
		$_POST['term'],
		$_POST['subject']
	);
	if ($subjectStats != null) {
		extract($subjectStats);
		$query->updateQuery(
			"scores",
			["classavg" => $sbavg, "min" => $sbmin, "maxi" => $sbmax],
			["class" => $_POST['class'], "term" => $_POST['term'], "subj" => $_POST['subject'], "session" => $_POST['session']]
		);
	}



	$students = $query->checkSubject(
		$_POST['class'],
		$_POST['session'],
		$_POST['term'],
		$_POST['subject']
	);
}

require 'view/admin/subject.view.php';
