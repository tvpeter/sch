<?php session_unset();
require 'bridge.php';
if (isset($_GET['cid']));
$gadmno = $_GET['cid'];
if (isset($_GET['class']));
$gclass = $_GET['class'];
if (isset($_GET['session']));
$gsession = $_GET['session'];
if (isset($_GET['term']));
$gterm = $_GET['term'];

if ($gterm === "Term I") {
    $nterm = "Term II";
} else if ($gterm === "Term II") {
    $nterm = "Term III";
} else if ($gterm === "Term III") {
    $nterm = "Term I";
}

if ($gterm === "Term III") {
    $newS = substr($gsession, -4);
    $nn = $newS + 1;
    $nsession = $newS . '/' . $nn;
} else {
    $nsession = $gsession;
}

$section = substr($gclass, 0, 2);

$fees = $query->selectRow(["pib", "pis"], "newfees", ["session" => $nsession, "term" => $nterm, "section" => $section]);
if ($fees) {
    extract($fees);
}

$studentinfo = $query->getResults($gadmno, $gsession, $gclass, $gterm);
extract($studentinfo);

$totalStudents = $query->lookUp("admno", "results", ["class" => $gclass, "session" => $gsession, "term" => $gterm]);


$studentAtt = $query->selectRow(["*"], "skills", ["admno" => $gadmno, "session" => $gsession, "class" => $gclass, "term" => $gterm]);
if ($studentAtt) {
    extract($studentAtt);
}
$termInfo = $query->selectRow(["termst", "terme", "nextterm"], "control", ["session" => $gsession, "term" => $gterm]);
if ($termInfo) {
    extract($termInfo);
}


$studentrs = $query->selectAndOrder(["subj", "test", "exam", "total", "classavg", "min", "maxi", "subjpos"], "scores", ["admno" => $gadmno, "session" => $gsession, "class" => $gclass, "term" => $gterm], "subj", "ASC");


require 'view/admin/results.view.php';
