<?php 
 require '../bridge.php';

if (isset($_GET['cid'])) { $gadmno = $_GET['cid']; }
if (isset($_GET['class'])) { $gclass = $_GET['class']; }
if (isset($_GET['session'])) { $gsesion = $_GET['session']; }
if (isset($_GET['term'])) {	$gterm = $_GET['term']; }
if (isset($_GET['subj'])) {	$gsubj = $_GET['subj']; }

$studentScore = $query->selectRow(["subj", "test", "exam", "total"], "scores", ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsesion, "term"=>$gterm, "subj"=>$gsubj]);
extract($studentScore);

$studentName =$query->selectRow(["name"], "students", ["admno"=>$gadmno]);
extract($studentName);

if (isset($_POST['submit'])) {
	$errors = [];

	$totalMarks = $_POST['test'] + $_POST['exam'];

	if ( $totalMarks  > 100 ) {
		$errors['total'] = "Total marks cannot be more than 100";
	}

	if (empty($errors)) {

	$status = false;
	
	$success1 = $query->updateQuery("scores", ["test"=> $_POST['test'], "exam"=>$_POST['exam'], "total"=>$totalMarks], ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsesion, "term"=>$gterm, "subj"=>$gsubj]);
	

	if ($gterm == "Term I") 
	{
	$otherTerms = $query->selectRow(["term2", "term3"], "comb", ["session"=>$gsesion, "admno"=>$gadmno, "subj"=>$gsubj, "class"=>$gclass]);

		if ($otherTerms) 
		{
			extract($otherTerms);

			$avg = ($term2 + $term3 + $totalMarks)/3.0;
		//$avg = (array_sum($otherTerms) + $totalMarks)/3.0;

		$status = $query->updateQuery("comb", ["term1"=>$totalMarks, "avg"=>$avg], ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsesion, "subj"=>$gsubj]);

	}else {
		 $status = $query->dbInsert("comb", ["admno" => $gadmno, "class"=>$gclass, "session"=>$gsesion, "subj"=>$gsubj, "term1"=>$totalMarks]);
		}

	}elseif ($gterm == "Term II") 
	{
	$otherTerms = $query->selectRow(["term1", "term3"], "comb", ["session"=>$gsesion, "admno"=>$gadmno, "subj"=>$gsubj, "class"=>$gclass]);
	if ($otherTerms) {
		extract($otherTerms);
		$avg = ($term1 + $term3 + $totalMarks)/3.0;
		//$avg = (array_sum($otherTerms)+ totalMarks)/3.0;

		$status = $query->updateQuery("comb", ["term2"=>$totalMarks, "avg"=>$avg], ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsesion, "subj"=>$gsubj]);
	}else{
		$status = $query->dbInsert("comb", ["admno" => $gadmno, "class"=>$gclass, "session"=>$gsesion, "subj"=>$gsubj, "term2"=>$totalMarks]);
	}

}elseif ($gterm === "Term III") {

	$otherTerms =$query->selectRow(["term1", "term2"], "comb", ["session"=>$gsesion, "admno"=>$gadmno, "subj"=>$gsubj, "class"=>$gclass]);

		if ($otherTerms) 
		{
			extract($otherTerms);
			$avg = ($term1 + $term2 + $totalMarks)/3.0;
		//$avg = (array_sum($otherTerms) + $totalMarks)/3.0;

		$status= $query->updateQuery("comb", ["term3"=>$totalMarks, "avg"=>$avg], [
			"admno"=>$gadmno, "class"=>$gclass, "session"=>$gsesion, "subj"=>$gsubj]);

	}else {
		$status= $query->dbInsert("comb", ["admno" => $gadmno, "class"=>$gclass, "session"=>$gsesion, "subj"=>$gsubj, "term3"=>$totalMarks]);
	}
}

header("location:viewsubjects.php?cid=$gadmno&class=$gclass&session=$gsesion&term=$gterm");

}
}

require '../view/admin/editscore.view.php';