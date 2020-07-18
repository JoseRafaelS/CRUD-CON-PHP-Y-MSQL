<?php

require_once "autoload.php";
require_once "config/configuracion.php";
require_once "view/header.php";

if(isset($_GET['controller']) && class_exists($_GET['controller'])){
    $nombre_controller = $_GET['controller'];
    $prueva = new $nombre_controller();

    if(isset($_GET['action']) && method_exists($prueva,$_GET['action'])){
        $action = $_GET['action'];
        $prueva->$action();
    }else{
        echo "<h1>El metodo no existe</h1>";
    }
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
   $controller = controller_defaul;
   $action = action_defaul;
   $prueva = new $controller();
   $prueva->$action();
}else{
    echo "<h1>El controlador no existe</h1>";
}

require_once "view/footer.php";

