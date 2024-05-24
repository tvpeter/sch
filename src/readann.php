<?php    session_start();
require 'bridge.php';

if (isset($_GET['id'])) {
	
	$ann = $query->selectRow(["*"], "announcements", ["id"=>$_GET['id']]);
	
}

require 'view/admin/readann.view.php';