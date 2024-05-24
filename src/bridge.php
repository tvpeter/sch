<?php
require 'model/Connection.php';
require 'model/QueryHandle.php';
//require 'model/Router.php';

$config = require 'model/config.php';

$conn = Connection::make($config);

$query = new QueryHandle($conn);
