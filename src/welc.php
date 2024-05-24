<?php session_start();
require_once 'bridge.php';
if (array_key_exists('adtodo', $_POST) && isset($_POST['tdbody'])) {
	$query->dbInsert("todo", ["name"=>$_SESSION['_ref_user'], "body"=>$_POST['tdbody'] ]);
	}
$list = $query->selectAndOrder(["id", "body", "pdate"], "todo", ["name"=>$_SESSION['_ref_user']], "pdate", "DESC");

require_once 'view/admin/welc.view.php';

?>