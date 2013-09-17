<?php

class indexController extends Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        
        $this->_view->assign('titulo', 'Portada');
        //item es el id del elemento que queremos resaltar / seccion actual tras click en enlace 
        $this->_view->renderizar('index', 'inicio');
      
    }
}

?>
