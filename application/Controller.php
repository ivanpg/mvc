<?php

//clase padre de los controladores, no puede ser instanciada, solo es el "molde"
abstract class Controller {

    //ya que las instancias que hereden necesitarán una instancia de View para renderizar
    protected $_view;
    protected $_acl;
    protected $_request;

    public function __construct() {
        $this->_acl = new Acl();
        $this->_request = new Request();
        $this->_view = new View($this->_request, $this->_acl);
    }

    //obligamos que todos las clases que hereden de controler implementen una funcion index
    //así nos aseguramos que todos los controladores tinen una función index
    abstract public function index();

    //método neceserio para obtener una instancia de un modelo determinado
    //cargar modelos perteneciente a un modulo o no
    protected function loadModel($modelo, $modulo = false) {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';

        if (!$modulo) {
            $modulo = $this->_request->getModulo();
        }

        if ($modulo) {
            //si es default quiere decir q quiero un modulo general => de la carpeta /models fuera de modulos
            if ($modulo != 'default') {
                $rutaModelo = ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $modelo . '.php';
            }
        }


        if (is_readable($rutaModelo)) {
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        } else {
            throw new Exception('Error de modelo');
        }
    }

    protected function getLibrary($libreria) {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';

        if (is_readable($rutaLibreria)) {
            require_once $rutaLibreria;
        } else {
            throw new Exception('Error de libreria');
        }
    }

    //sanear info pasada por formulario.
    protected function getTexto($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }

        return '';
    }

    //filtrar enterios que lleguen por post
    protected function getInt($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }

        return 0;
    }

    protected function filtrarInt($int) {
        $int = (int) $int;
        if (is_int($int))
            return $int;
        else
            return 0;
    }

    protected function redireccionar($ruta = false) {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function getPostParam($clave) {
        if (isset($_POST[$clave])) {
            return $_POST[$clave];
        }
    }

    //escapa valores que se van a usar en una consulta PDO sql
    protected function getSql($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            //eliminamos etiquetas html y php
            $_POST[$clave] = strip_tags($_POST[$clave]);

            if (!get_magic_quotes_gpc()) {
                //si no esta activado escapamos comillas
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }

            return trim($_POST[$clave]);
        }
    }

    //Elimina caracateres no alfanumericos
    protected function getAlphaNum($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }

    public function validarEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    protected function formatPermiso($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = (string) preg_replace('/[^A-Z_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }
}

?>
