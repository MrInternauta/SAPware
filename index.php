
<?php
session_start();
require_once 'autoload.php';

if(isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'].'Controller';
    
}else{
    header('Location: index.php?controller=Usuario&action=login');
}
if(class_exists($nombre_controlador)){
   
    $controlador = new $nombre_controlador();
    if(isset($_GET['action'])  && method_exists($controlador,$_GET['action'] )){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo"La pagina no existe!!";
    }
}else{
    echo"La pagina no existe!!!";
}






?>