<?php

require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';

class View extends Smarty {

    //necesario para identidicar el directorio de la vista que queremos
    //cada controlador tiene una vista
    private $_request;
    private $_js;
    private $_acl;
    private $_rutas;
    private $_jsPlugin;

    //necesitamos un objeto Request para poder obtener información de el
    public function __construct(Request $peticion, Acl $acl) {
        parent::__construct();
        $this->_request = $peticion;
        $this->_js = array();
        $this->_acl = $acl;
        $this->_rutas = array();
        $this->_jsPlugin = array();

        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();

        if ($modulo) {
            $this->_rutas['view'] = ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'modules/' . $modulo . '/views/' . $controlador . '/js/';
        } else {
            $this->_rutas['view'] = ROOT . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = BASE_URL . 'views/' . $controlador . '/js/';
        }
    }

    public function renderizar($vista, $item = false, $noLayout = false) {
        //definir directorios de smarty
        $this->template_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;
        $this->config_dir = ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' . DS;
        $this->cache_dir = ROOT . 'tmp' . DS . 'cache' . DS;
        $this->compile_dir = ROOT . 'tmp' . DS . 'template' . DS;

        $rutaModuloUsuarios = BASE_URL . 'usuarios' . DS;

        //echo $rutaEnlace . "<br/>";
        $menu = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL,
                'imagen' => 'icon-home'
            ),
            array(
                'id' => 'post',
                'titulo' => 'Post',
                'enlace' => BASE_URL . 'post',
                'imagen' => 'icon-flag'
            ),
            array(
                'id' => 'listado',
                'titulo' => 'Listado',
                'enlace' => BASE_URL . 'listado',
                'imagen' => 'icon-random'
            )
        );

        if (Session::get('autenticado')) {
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Cerrar sesión',
                'enlace' => $rutaModuloUsuarios . 'login/cerrar',
                'imagen' => 'icon-book'
            );
        } /* else {
          $menu[] = array(
          'id' => 'login',
          'titulo' => 'Iniciar sesión',
          'enlace' => $rutaModuloUsuarios . 'login'
          );

          $menu[] = array(
          'id' => 'registro',
          'titulo' => 'Registro',
          'enlace' => $rutaModuloUsuarios . 'registro'
          );
          } */

        $menuRight = array(
            array(
                'id' => 'usuarios',
                'titulo' => 'Usuarios',
                'enlace' => BASE_URL . 'usuarios',
                'imagen' => 'icon-user'
            ),
            array(
                'id' => 'acl',
                'titulo' => 'Listas de control de acceso',
                'enlace' => BASE_URL . 'acl',
                'imagen' => 'icon-list-alt'
            ),
            array(
                'id' => 'ajax',
                'titulo' => 'Ejemplo uso de AJAX',
                'enlace' => BASE_URL . 'ajax',
                'imagen' => 'icon-refresh'
            ),
            array(
                'id' => 'pdf',
                'titulo' => 'Documento PDF 1',
                'enlace' => BASE_URL . 'pdf/pdf1/param1/param2',
                'imagen' => 'icon-file'
            )
        );


        //inicializamos array
        $js = array();
        if (count($this->_js)) {
            $js = $this->_js;
        }



        $_params = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu' => $menu,
            'menu_right' => $menuRight,
            'item' => $item,
            'js' => $js,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' => APP_NAME,
                'app_slogan' => APP_SLOGAN,
                'app_company' => APP_COMPANY
            )
        );
        if (is_readable($this->_rutas['view'] . $vista . '.tpl')) {
            //de esta manera la ruta de la vista no sera views/layout. 
            //recordemos q layout hace un include al contenido de la vista.
            //mostrara directamente la vista sin el layout q hace de footer y header
            if ($noLayout) {
                $this->template_dir = $this->_rutas['view'];
                $this->display($this->_rutas['view'] . $vista . '.tpl');
                exit;
            }


            $this->assign('_contenido', $this->_rutas['view'] . $vista . '.tpl');
        } else {
            throw new Exception('Error de vista');
        }


        $this->assign('_acl', $this->_acl);
        $this->assign('_layoutParams', $_params);
        $this->display('template.tpl');
    }

    public function setJs(array $js) {
        if (is_array($js) && count($js)) {
            for ($i = 0; $i < count($js); $i++) {
                $this->_js[] = $this->_rutas['js'] . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }

    public function setJsPlugins(array $js) {
        if (is_array($js) && count($js)) {
            for ($i = 0; $i < count($js); $i++) {
                $this->_jsPlugin[] = BASE_URL . 'public/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js Plugin');
        }
    }

}

?>
