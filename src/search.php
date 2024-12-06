<?php session_start();
require_once 'bridge.php';

if ($_SESSION['role'] == "staff") {
	$classes = $query->selectAndOrder(["class"], "tclasses", ["name" => $_SESSION['_id_']], "class", "ASC");
} elseif ($_SESSION['role'] == "admin") {
	$classes = $query->selectColumn("class", "class");
}
$sieved = array_column($classes, "class");

if (isset($_POST['searchqn']) && !empty($_POST['searchqn'])) {
	$result =  stripslashes($_POST['searchqn']);
	$students = $query->searchResults($result);
}

require_once 'view/admin/search.view.php';
