<?php

class postModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPosts() {
        $post = $this->_db->query("select * from posts");
        //matriz cuyas filas son array asociativo
        return $post->fetchall();
    }

    public function getPost($id) {
        $id = (int) $id;
        $post = $this->_db->query("select * from posts where id = $id");
        //array asociativo
        return $post->fetch();
    }

    public function insertarPost($titulo, $cuerpo, $imagen) {
        $this->_db->prepare("INSERT INTO posts VALUES (null, :titulo, :cuerpo, :imagen)")
                ->execute(
                        array(
                            ':titulo' => $titulo,
                            ':cuerpo' => $cuerpo,
                            ':imagen' => $imagen
                ));
    }

    public function editarPost($id, $titulo, $cuerpo) {
        $id = (int) $id;

        $this->_db->prepare("UPDATE posts SET titulo = :titulo, cuerpo = :cuerpo WHERE id = :id")
                ->execute(
                        array(
                            ':id' => $id,
                            ':titulo' => $titulo,
                            ':cuerpo' => $cuerpo
                ));
    }

    public function eliminarPost($id) {
        $id = (int) $id;
        $this->_db->query("DELETE FROM posts WHERE id = $id");
    }
}

?>
