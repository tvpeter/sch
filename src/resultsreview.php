<?php session_start();
require 'bridge.php';

$options = $query->aeOptions();

if (isset($_GET['cid']))   $admno = $_GET['cid'];
if (isset($_GET['class']))  $class = $_GET['class'];
if (isset($_GET['session']))  $session = $_GET['session'];
if (isset($_GET['term']))   $term = $_GET['term'];

$studentinfo = $query->resultsReview($admno, $session, $class, $term);
extract($studentinfo);

if (isset($_POST['postinfo'])) {


	if (($query->lookUp("admno", "skills", ["admno" => $admno, "class" => $class, "session" => $session, "term" => $term])) < 1) {
		$query->dbInsert("skills", [
			"admno" => $admno,
			"class" => $class,
			"session" => $session,
			"term" => $term,
			"aesth" => $_POST['aesthetic'],
			"attendance" => $_POST['attendance'],
			"creativity" => $_POST['creativity'],
			"honesty" => $_POST['honesty'],
			"initiative" => $_POST['initiative'],
			"leadership" => $_POST['leadership'],
			"neatness" => $_POST['neatness'],
			"obedience" => $_POST['obedience'],
			"politeness" => $_POST['politeness'],
			"punctuality" => $_POST['punctuality'],
			"scontrol" => $_POST['scontrol'],
			"responsibility" => $_POST['resp'],
			"sociability" => $_POST['sociability'],
			"organised" => $_POST['orga'],
			"persevere" => $_POST['perseverance'],
			"cooperate" => $_POST['cooperation'],
			"games" => $_POST['games'],
			"sports" => $_POST['sports'],
			"handle" => $_POST['tools'],
			"communication" => $_POST['comm'],
			"painting" => $_POST['painting'],
			"craft" => $_POST['craft'],
			"gymnastics" => $_POST['gymnastics'],
			"present" => $_POST['present'],
			"total" => $_POST['totaldays']
		]);

		$query->updateQuery("results", ["tcomment" => $_POST['remarks'], "tdate" => date("Y-m-d")], ["admno" => $admno, "class" => $class, "session" => $session, "term" => $term]);
		header("location:viewresults.php");
	}
	header("location:viewresults.php");
}


require 'view/admin/resultsreview.view.php';
