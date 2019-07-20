<?php session_start();
    require 'bridge.php';

$session = $query->sSession("session", "sessionstatus");
$classes = $query->selectAll("class", "class");
$gterm = $query->term();


if (isset($_POST['check']) && isset($_POST['session']) &&isset($_POST['term'])){

	$tclasses = $query->getTermClasses("scores", $_POST['session'], $_POST['term']);

}
    
require 'view/admin/analysis.view.php';