<?php session_start();
    require 'bridge.php';

$session = $query->sSession("session", "sessionstatus");
$gterm = $query->term();


if (isset($_POST['check']) && isset($_POST['session']) &&isset($_POST['term'])){

	$tclasses = $query->getTermClasses("results", $_POST['session'], $_POST['term']);

}
    
require 'view/admin/ranalysis.view.php';