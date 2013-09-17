<?php

class postController extends Controller {

    private $_post;

    public function __construct() {
        parent::__construct();
        $this->_post = $this->loadModel('post');
    }

    public function index($pagina = false) {

        //añadimos para probar
        /* for ($i = 0; $i < 300; $i++) {
          $model = $this->loadModel('post');
          $model->insertarPost('titulo ' . $i, 'cuerpo' . $i);
          } */

        if (!$this->filtrarInt($pagina)) {
            $pagina = false;
        } else {
            $pagina = (int) $pagina;
        }


        $this->getLibrary('paginador');
        $paginador = new Paginador();

        $this->_view->assign('posts', $paginador->paginar($this->_post->getPosts(), $pagina));
        $this->_view->assign('paginacion', $paginador->getView('prueba', 'post/index'));
        $this->_view->assign('titulo', 'Post');
        $this->_view->renderizar('index', 'post');
    }

    public function nuevo() {

        $this->_acl->acceso('nuevo_post');
        $this->_view->assign('titulo', 'Nuevo Post');

        //añadimos nuevo.js
        $this->_view->setJs(array('nuevo'));
        $this->_view->setJsPlugins(array('jquery.validate'));

        if ($this->getInt('guardar') == 1) {
            //mejorar para coger solo los datos que nos interesan
            $this->_view->datos = $_POST;

            if (!$this->getTexto('titulo')) {
                $this->_view->assign('_error', 'Debe introducir el titulo del post');
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }

            if (!$this->getTexto('cuerpo')) {
                $this->_view->assign('_error', 'Debe introducir el cuerpo del post');
                $this->_view->renderizar('nuevo', 'post');
                exit;
            }

            $imagen = '';
            //si se envió un archivo lo procesamos
            if (isset($_FILES['imagen']['name'])) {
                $this->getLibrary('upload' . DS . 'class.upload');
                $ruta = ROOT . 'public' . DS . 'img' . DS . 'post' . DS;
                $upload = new upload($_FILES['imagen'], 'es_ES');
                //indicamos tipos MIME que seran ageptados. en este caso aceptamos todo tipo de imagen
                $upload->allowed = array('image/*');
                //renombrar fichero
                $upload->file_new_name_body = 'upl_' . uniqid();
                //subimos el archivo indicandole la ruta donde guardarlo
                $upload->process($ruta);

                //si todo ha ido correctamente creamos miniatura
                if ($upload->processed) {
                    $imagen = $upload->file_dst_name;
                    //podemos trabajar con archivos que ya esten ene el servidor
                    //$upload->file_dst_pathname devuelve ruta completa de donde fue guardado archivo subido
                    //con el método process
                    $thumb = new upload($upload->file_dst_pathname);
                    $thumb->image_resize = true;
                    $thumb->image_x = 100;
                    $thumb->image_y = 70;
                    //añado prefijo a nombre para indicar que es una miniatura
                    $thumb->file_name_body_pre = 'thumb_';
                    //procesamos imagen
                    $thumb->process($ruta . 'thumb' . DS);
                } else {
                    $this->_view->assign('_error', $upload->error);
                    $this->_view->renderizar('nuevo', 'post');
                    exit;
                }
            }


            //no nos sirve el método getTexto ya que este usa htmlspecialchars (transforma los caracteres especiales)
            //y las consultas preparadas también, lo usan por lo cual serían nuevamente trasformados y guardaría caracteres
            //no validos en la base de datos. 
            //ej 'prueba' se transformaría en &quot;prueba&quot; en getTexto() y luego en &amp;quot;prueba&amp;quot; en la consulta preparada. 
            //esto sería lo que se insertaría.
            //Y si se transfoma solo una vez, en la consulta preparada, se guardaría &quot;prueba&quot; q es lo q queremos ya 
            //q al extraer y mostrar esto se renderizaría 'prueba'.
            $this->_post->insertarPost($this->getSql('titulo'), $this->getSql('cuerpo'), $imagen);
            $this->redireccionar('post');
        }

        $this->_view->renderizar('nuevo', 'post');
    }

    public function editar($id) {

        $this->_acl->acceso('editar_post');

        if (!$this->filtrarInt($id))
            $this->redireccionar('post');
        //si no existe el post que queremos redireccionar
        if (!$this->_post->getPost($this->filtrarInt($id)))
            $this->redireccionar('post');

        $this->_view->assign('titulo', 'Editar Post');
        $this->_view->setJs(array('nuevo'));

        if ($this->getInt('guardar') == 1) {
            $this->_view->assign('datos', $_POST);

            if (!$this->getTexto('titulo')) {
                $this->_view->assign('_error', 'Debe introducir el titulo del post');
                $this->_view->renderizar('editar', 'post');
                exit;
            }

            if (!$this->getTexto('cuerpo')) {
                $this->_view->assign('_error', 'Debe introducir el cuerpo del post');
                $this->_view->renderizar('editar', 'post');
                exit;
            }
            //no nos sirve el método getTexto ya que este usa htmlspecialchars (transforma los caracteres especiales)
            //y las consultas preparadas también lo usan por lo cual serían nuevamente trasformados y guardaría caracteres
            //no validos en la base de datos. 
            //ej 'prueba' se transformaría en &quot;prueba&quot; en getTexto() y luego en &amp;quot;prueba&amp;quot; en la consulta preparada. 
            //esto sería lo que se insertaría.
            //Y si se transfoma solo una vez, en la consulta preparada, se guardaría &quot;prueba&quot; q es lo q queremos ya 
            //q al extraer y mostrar esto se renderizaría 'prueba'.
            $this->_post->editarPost($this->filtrarInt($id), $this->getSql('titulo'), $this->getSql('cuerpo'));

            $this->redireccionar('post');
        }
        //si no se ha enviado guardar, los datos de la vista los llenaremos con los datos 
        //que ya estaban en dicho post (los que queriamos editar)
        $this->_view->assign('datos', $this->_post->getPost($this->filtrarInt($id)));
        $this->_view->renderizar('editar', 'post');
    }

    public function eliminar($id) {
        Session::acceso('usuario');
        if (!$this->filtrarInt($id)) {
            $this->redireccionar('post');
        }

        if (!$this->_post->getPost($this->filtrarInt($id))) {
            $this->redireccionar('post');
        }

        $this->_post->eliminarPost($this->filtrarInt($id));
        $this->redireccionar('post');
    }
}

?>
