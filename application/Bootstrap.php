<?php

class Bootstrap{
    public static function run(Request $peticion){
        $modulo = $peticion->getModulo();
        $controller = $peticion->getControlador() . 'Controller';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        
        //dependiendo de si la ruta pertenece a un modulo o no, el controlador puede estar dentro de controller
        //o dentro de modulo/controllers
        if($modulo){
            $rutaModulo = ROOT . 'controllers' . DS . $modulo . 'Controller.php';
            
            if(is_readable($rutaModulo)){
                require_once $rutaModulo;
                $rutaControlador = ROOT . 'modules'. DS . $modulo . DS . 'controllers' . DS . $controller . '.php';
            }
            else{
                throw new Exception('Error de base de modulo');
            }
        }
        else{
            $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        }
        
       

      
        //$rutaControlador = ROOT . 'Controllers' . DS . $controller .'.php';
        
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            
            //si hemos incluido indexController ahora creamos una instancia de la clase.
            $controller = new $controller;
            
            //si llamamos a un metodo valido de la clase 
            if(is_callable(array($controller,$metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{//si no es válido llamaremos a index
                $metodo = 'index';
            }
            
            //si hay argumentos se los pasaremos al método de la clase
            if(isset($args)){
                call_user_func_array(array($controller,$metodo),$args);
            }
            else{//si no lo llamamos sin argumentos, al metodo del controlador
                 call_user_func(array($controller,$metodo));
            }
        }
        else{//si controlador no es legible devolver excepción
            throw new Exception('no encontrado');
        }
    }
}
?>
