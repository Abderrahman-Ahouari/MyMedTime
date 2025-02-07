<?php
require 'C:/xampp/htdocs/MyMedTime/app/controllers/UserController.php';
require 'C:/xampp/htdocs/MyMedTime/app/controllers/DoctorController.php';
require 'C:/xampp/htdocs/MyMedTime/app/controllers/patientController.php';

class Router{
    public  $routes = [];

    public  function add($path, $controller, $action){
        $route = ['path'=>$path, 'controller'=>$controller, 'action'=>$action];
        $this->routes[] = $route;
    }
    public  function dispatch(){
       
        $uri = $_SERVER['REQUEST_URI'];
        $path = explode('/',$uri,4);
        foreach ($this->routes as $route) {
           if($route ["path"] == $path[3]){
            $controller = new $route['controller']();
            $action = $route['action'];
            $controller->$action();
           }
           
        }
        
        

    }
    public function ShowRoutes(){
        var_dump($this->routes);
    }

}