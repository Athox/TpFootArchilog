<?php

@ini_set('display_errors', 'on');	

require 'controllers/router.php';

$router = new Router();
$router->routerRequete();

?>