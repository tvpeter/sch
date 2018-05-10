<?php

#attempted to define the path;
//define("APP_PATH", dirname(__FILE__));


// require APP_PATH.'/model/Connection.php';
// require APP_PATH.'/model/QueryHandle.php';
// require APP_PATH.'/model/Router.php';


//$config = require APP_PATH.'/model/config.php';

require 'model/Connection.php';
require 'model/QueryHandle.php';
require 'model/Router.php';
$config = require 'model/config.php';

$conn = Connection::make($config);

$query = new QueryHandle($conn);


$router = new Router;

require 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

require $router->direct($uri);



 ?>
