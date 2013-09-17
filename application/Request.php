<?php

/* Queremos optener dos tipos de url:
  1. modulo/controlador/metodo/argumentos
  2. controlador/metodo/argumentos */

class Request {

    private $_controlador;
    private $_metodo;
    private $_argumentos;
    private $_modulo;
    private $_modules;

    public function __construct() {
        //'url' es la variable elegida en el .htaccess
        //contiene la url menos el dominio y subdominio =>/controlador/metodo/arg
        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            //si pasamos explode('/','////controller///method////args///');
            //Array ( [0] => [1] => [2] => [3] => [4] => controller [5] => [6] => [7] => method [8] => [9] => [10] => [11] => args [12] => [13] => [14] => )
            $url = explode('/', $url);
            //filtramos elementos pasandole función callback, que es opcional
            //si no le pasamos función, los elementos false los borra por lo tanto la entre la anterior función y esta eliminamos los '/' sobrantes
            $url = array_filter($url);

            /* modulos de la app */
            $this->_modules = array('usuarios');
            /* Queremos optener dos tipos de url:
              1. modulo/controlador/metodo/argumentos
              2. controlador/metodo/argumentos */
            //extraemos el primer elemento de la url
            //por lo tanto primero extraera el modulo o controlador
            $this->_modulo = strtolower(array_shift($url));

            if (!$this->_modulo) {
                $this->_modulo = false;
            } else {
                if (count($this->_modules)) {
                    //miramos dentro del array de los modulos disponibles y si existe
                    //es q efectivamente era un modulo y si no se trataba de un controlador
                    if (!in_array($this->_modulo, $this->_modules)) {
                        $this->_controlador = $this->_modulo;
                        $this->_modulo = false;
                    } else {
                        //si era modulo, el siguiente elemento del array es el controlador
                        $this->_controlador = strtolower(array_shift($url));
                        
                        //si ya existe un modulo pero no hay un controlador, asi accederemos al controlador
                        // por defecto
                        if (!$this->_controlador) {
                            $this->_controlador = 'index';
                        }
                    }
                } else {
                    // si no existen modulos lo que creiamos q podia ser modulo es un controlador finalmente
                    $this->_controlador = $this->_modulo;
                    $this->_modulo = false;
                }
            }

            //el primer elemento que ahora extraera es el método
            $this->_metodo = strtolower(array_shift($url));
            //los elementos que quedan son los argumentos
            $this->_argumentos = $url;
        }

        if (!$this->_controlador) {
            $this->_controlador = DEFAULT_CONTROLLER;
        }

        if (!$this->_metodo) {
            $this->_metodo = 'index';
        }

        //comprobamos si existe ya que puede que que la url no tenga argumentos y por lo tanto depues de los
        //dos primeros array_shift, $url fuera null;
        if (!isset($this->_argumentos)) {
            //si no existe lo inicializamos
            $this->_argumentos = array();
        }
    }

    public function getControlador() {
        return $this->_controlador;
    }

    public function getMetodo() {
        return $this->_metodo;
    }

    public function getArgs() {
        return $this->_argumentos;
    }
    
    public function getModulo()
    {
        return $this->_modulo;
    }


}

?>
