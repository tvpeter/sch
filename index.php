<?php 
include_once 'bridge.php';

$anns = $query->selectColsOrder(["topic", "body", "postime"], "announcements", "postime", "DESC");
require_once 'view/public/index.php';
?>