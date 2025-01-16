<?php session_start();
require 'bridge.php';
if (isset($_GET['cid']))   $gadmno = $_GET['cid'];
if (isset($_GET['class']))  $gclass = $_GET['class'];
if (isset($_GET['session']))  $gsession = $_GET['session'];
if (isset($_GET['term']))   $gterm = $_GET['term'];
$subjects = $query->selectAndOrder(["*"], "scores", ["admno" => $gadmno, "class" => $gclass, "session" => $gsession, "term" => $gterm], "subj", "ASC");
$studentinfo = $query->selectRow(["name", "passport"], "students", ["admno" => $gadmno]);
extract($studentinfo);

$checkInResult = $query->lookUp("admno", "results", ["admno" => $gadmno, "class" => $gclass, "session" => $gsession, "term" => $gterm]);
$totalsubjects = $query->selectRow(["subno"], "subjno", ["session" => $gsession, "term" => $gterm, "class" => $gclass]);
if ($totalsubjects) {
    extract($totalsubjects);
}


if (array_key_exists("del", $_POST)) {
    foreach ($_POST['delete'] as $id) {
        if (($query->deleteRow("comb", [
                "admno" => $gadmno,
                "class" => $gclass,
                "session" => $gsession,
                "subj" => $id
            ])) &&
            ($query->deleteRow("scores", [
                "admno" => $gadmno,
                "class" => $gclass,
                "session" => $gsession,
                "term" => $gterm,
                "subj" => $id
            ]))
        ) {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=viewsubjects.php?cid=$gadmno&&class=$gclass&&session=$gsession&&term=$gterm\"";
        }
    }
}
require 'view/admin/viewsubjects.view.php';
