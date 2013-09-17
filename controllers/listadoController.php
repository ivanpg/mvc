<?php

class listadoController extends Controller {

    private $_listado;

    public function __construct() {
        parent::__construct();
        $this->_listado = $this->loadModel('listado');
    }

    public function index($pagina = false) {
        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }

        $this->getLibrary('paginador');
        $paginador = new Paginador();
        $ajaxModel = $this->loadModel('ajax');

        $this->_view->setJs(array('lista'));
        $this->_view->assign('posts', $paginador->paginar($this->_listado->getPrueba(), $pagina));
        $this->_view->assign('paises', $ajaxModel->getPaises());
        //metemos el contenido de la plantilla procesada de paginación dentro de variable paginacion
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax', 'listado/lista'));
        $this->_view->assign('titulo', 'Listado y paginación');
        $this->_view->renderizar('lista', 'listado');
    }
    
    /* método utilizado desde una petición ajax desde listado/js/lista.js */
    public function listaAjax() {
        $pagina = $this->getInt('pagina');
        $nombre = $this->getSql('nombre');
        $pais = $this->getInt('pais');
        $ciudad = $this->getInt('ciudad');
        $registros = $this->getInt('registros');
        $condicion = "";

        if ($nombre) {
            $condicion .= " AND `nombre` like '$nombre%' ";
        }

        if ($pais) {
            $condicion .= " AND `id_pais` = $pais ";
        }

        if ($ciudad) {
            $condicion .= " AND `id_ciudad` = $ciudad ";
        }



        $this->getLibrary('paginador');
        $paginador = new Paginador();


        $this->_view->assign('posts', $paginador->paginar($this->_listado->getPrueba($condicion), $pagina,$registros));
        $this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
        //al poner true en ultimo parametro ($noLayout) indico q no renderizare el layout(union de header y footer) 
        //q incluye la vista y por lo tanto solo mostrara la vista. 
        //como esta función se llamara desde ajax, al quitar el layout solo enviará los datos necesarios de la vista
        //y no layout/template.tpl q contiene, ademas de la inclusión de dicha vista, el header, footer y paginación 
        $this->_view->renderizar('lista_nolayout', false, true);

        //renderizo listado/lista_nolayout que es distinta a la listado/lista.tpl.
        //La primera solo contiene la tabla de resultados necesarios para devolver con ajax.
        //la segunda tiene titulos y demas cosas ya q sea accesible por url directamente sin ajax.
    }
}
?>
