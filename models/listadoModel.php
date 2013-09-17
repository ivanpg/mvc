<?php

class listadoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertarPrueba($nombre) {
        $this->_db->prepare("INSERT INTO prueba VALUES (null, :nombre)")
                ->execute(
                        array(
                            ':nombre' => $nombre
        ));
    }

    public function getPrueba($condicion = "") {
        $post = $this->_db->query(
                "select `r`.*, `p`.`pais`, `c`.`ciudad` from `prueba` `r`, `paises` `p`, `ciudades` `c`" .
                "where `r`.`id_pais` = `p`.`id` and `r`.`id_ciudad` = `c`.`id` $condicion order by id asc");
        return $post->fetchAll();
    }

}

?>
