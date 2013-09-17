<?php

class Paginador {

    private $_datos;
    //gurada los parametros de la paginación
    private $_paginacion;

    public function __construct() {
        $this->_datos = array();
        $this->_paginacion = array();
    }

    //$pagina actual del paginador
    //$limite de registros por pagina
    //$paginacion es el rango de paginas que vamos a traer. No hace falta traer todas las paginas que nos pueda dar la consulta
    public function paginar($query, $pagina = false, $limite = false, $paginacion = false) {
        if ($limite && is_numeric($limite)) {
            $limite = $limite;
        } else {
            $limite = 10;
        }

        if ($pagina && is_numeric($pagina)) {
            $pagina = $pagina;
            $inicio = ($pagina - 1) * $limite;
        } else {
            $pagina = 1;
            $inicio = 0;
        }

        $registros = count($query);
        $total = ceil($registros / $limite);
        //extraer trozo del array indexado de posts (cada elemento es a la vex un array para cada post ind por columnas)
        $this->_datos = array_slice($query, $inicio, $limite);


        $paginacion = array();
        $paginacion['actual'] = $pagina;
        $paginacion['total'] = $total;
        $paginacion['limite'] = $limite;

        if ($pagina > 1) {
            $paginacion['primero'] = 1;
            $paginacion['anterior'] = $pagina - 1;
        } else {
            $paginacion['primero'] = '';
            $paginacion['anterior'] = '';
        }

        if ($pagina < $total) {
            $paginacion['ultimo'] = $total;
            $paginacion['siguiente'] = $pagina + 1;
        } else {
            $paginacion['ultimo'] = '';
            $paginacion['siguiente'] = '';
        }

        $this->_paginacion = $paginacion;
        $this->_rangoPaginacion($paginacion);

        return $this->_datos;
    }

    // devuelve el rango de paginas que apareceran. Con esto sabremos el número de paginas que aparecerán con link
    // a la derecha y a la izquierda de la actual
    private function _rangoPaginacion($limite = false) {
        if ($limite && is_numeric($limite)) {
            $limite = $limite;
        } else {
            $limite = 10;
        }

        $total_paginas = $this->_paginacion['total'];
        $pagina_seleccionada = $this->_paginacion['actual'];
        $rango = ceil($limite / 2);
        $paginas = array();

        $rango_derecho = $total_paginas - $pagina_seleccionada;

        if ($rango_derecho < $rango) {
            $resto = $rango - $rango_derecho;
        } else {
            $resto = 0;
        }

        $rango_izquierdo = $pagina_seleccionada - ($rango + $resto);

        for ($i = $pagina_seleccionada; $i > $rango_izquierdo; $i--) {
            if ($i == 0) {
                break;
            }

            $paginas[] = $i;
        }

        sort($paginas);

        if ($pagina_seleccionada < $rango) {
            $rango_derecho = $limite;
        } else {
            $rango_derecho = $pagina_seleccionada + $rango;
        }

        for ($i = $pagina_seleccionada + 1; $i <= $rango_derecho; $i++) {
            if ($i > $total_paginas) {
                break;
            }

            $paginas[] = $i;
        }

        $this->_paginacion['rango'] = $paginas;

        return $this->_paginacion;
    }

    //podremos utilizar la misma vista de paginación en varias paginaciones
    //$link ruta hacia donde debe de enviarse el numero de página para traer la paginación
    public function getView($vista, $link = false) {
        //ruta de la plantilla para poder utilizarse el paginador en cualquier vista
        $rutaView = ROOT . 'views' . DS . '_paginador' . DS . $vista . '.php';

        if ($link)
            $link = BASE_URL . $link . '/';

        if (is_readable($rutaView)) {
            ob_start();
    
            //estraemos el contenido de la vista ya que capturamos todo las etiquetas html y echos q pueda haber
            //almacenamos la vista en el buffer con la paginación y links ya hechos 
            //ya q dentro de esta plantilla se accede a  $this->_paginacion y a $link
            include $rutaView;
            $contenido = ob_get_contents();
            ob_end_clean();

            return $contenido;
        }

        throw new Exception('Error de paginación');
    }

}

?>
