<?php session_start();
 require_once 'bridge.php';

$classes = $query->selectColumn("class", "class");
$error = $msg= [];

if (array_key_exists("submit", $_POST) && !empty($_POST['admn']) && !empty($_POST['class']) && !empty($_POST['session']) && !empty($_POST['term']) && !empty($_POST['pass'])) {
	if (!isset($_SESSION['code'])) {
	header("Refresh:0");
}

	if (!$_SESSION['code']) {
			header("Refresh:0");
		}
	if (strlen($_POST['admn']) != 4 ) {
		$error['admn'] = "WRONG ADMISSION NUMBER";
	}
	if (strtoupper($_POST['pass']) != $_SESSION['code']) {
	$error['cd'] = "WRONG VERIFICATION CODE";
	}

	if (empty($error)) {
		$class =$query->cleanInput($_POST['class']); 
		$session = $query->cleanInput($_POST['session']);
		$admno = $query->cleanInput($_POST['admn']);  
		$term = $query->cleanInput($_POST['term']); 
		
		$subno = $query->selectRow(["subno"], "subjno", ["class"=>$class, "session"=>$session, "term"=>$term]);	
		$stdn = $query->selectRow(["subjectsTotal"], "results", ["admno"=>$admno, "class"=>$class, "session"=>$session, "term"=>$term]);

		if ($subno['subno'] != $stdn['subjectsTotal']) {
					$msg['status'] = "Your result is under computation";
				}

		$resultStatus = $query->selectRow(["results_status"], "termstatus", ["class"=>$class, "session"=>$session, "term"=>$term]);
	
		if ($resultStatus['results_status'] != "approved") {
				$msg['status'] = "YOUR RESULT HAS NOT BEEN APPROVED";
			}else{
				header("location:results.php?cid=$admno&class=$class&session=$session&term=$term");
			}		

	}


}


require_once 'view/admin/check.view.php';