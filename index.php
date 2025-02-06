<?php
require 'C:/xampp/htdocs/MyMedTime/core/Router.php';
$route = new Router();
require 'C:/xampp/htdocs/MyMedTime/config/routes.php';



$route->dispatch();
?>