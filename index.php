<?php

define('DS', DIRECTORY_SEPARATOR);
//variable útil para la inclusión de archivos
define('ROOT', realpath(dirname(__FILE__)) . DS);
//definimos el directorio de las aplicaciones
define('APP_PATH', ROOT . 'application' . DS);



try {//con este try atrapamos todas las excepciones de los ficheros de inclusión
//inclusión de archivos
    require_once APP_PATH . 'Config.php';
    require_once APP_PATH . 'Acl.php';
    require_once APP_PATH . 'Request.php';
    require_once APP_PATH . 'Bootstrap.php';
    require_once APP_PATH . 'Controller.php';
    require_once APP_PATH . 'Model.php';
    require_once APP_PATH . 'View.php';
    require_once APP_PATH . 'Registro.php';
    require_once APP_PATH . 'Database.php';
    require_once APP_PATH . 'Session.php';
    require_once APP_PATH . 'Hash.php';
    Session::init();
   
    Bootstrap::run(new Request());
} catch (Exception $e) {
    echo $e->getMessage();
}


/* $r = new Request();
  echo $r->getControlador().'<BR/>';
  echo $r->getMetodo().'<BR/>';
  print_R($r->getArgs()); */
?>
