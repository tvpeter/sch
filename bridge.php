<?php 
require 'model/Connection.php';
require 'model/QueryHandle.php';
require 'model/Router.php';

$config = require 'model/config.php';

$conn = Connection::make($config);

$query = new QueryHandle($conn);


 // function displayErrors($err, $name)
	// {
	// 	if (isset($err[$name])) 
	// 		{
	// 			return "<span class='alert alert-danger'>".$err[$name]."</span>";
	// 		}
	// 	return "";
	// }



