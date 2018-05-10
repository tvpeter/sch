<?php 

    require '../bridge.php';

$session = $query->sSession();
$classes = $query->selectColumn("class", "class");

if (isset($_POST['check']) && isset($_POST['session']) && isset($_POST['class'])) {
	
	$anresult = $query->annualResults($_POST['class'], $_POST['session']);
	
}

    
require '../view/admin/annualresult.view.php';