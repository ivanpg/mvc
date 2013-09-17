<?php

class ajaxModel extends Model
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function getPaises()
    {
        $paises = $this->_db->query(
                "select * from paises"
                );
        return $paises->fetchAll();
    }
    
    public function getCiudades($pais)
    {
        $pais = (int) $pais;
        $ciudades = $this->_db->query(
                "select * from ciudades where pais={$pais}"
                );
                
        //posteriormente convertiremos los datos a json y si no se le indica nada, fetchAll
        //devueve array asociativo e indexado y lo queremos puramente asociativo.
        //no queremos Array([0] =>Array([fruit_id] => 1 [0] => 1 [name] => Apple [1] => Apple 
        //                              [variety] => Red Delicious [2] => Red Delicious));
        // queremos Array([0] =>Array([fruit_id] => 1 [name] => Apple 
        //                              [variety] => Red Delicious));

        $ciudades->setFetchMode(PDO::FETCH_ASSOC);
        return $ciudades->fetchAll();
    }
    
    public function insertarCiudad($ciudad, $pais)
    {
        $pais = (int) $pais;
        $this->_db->prepare(
                "insert into ciudades values(null, :ciudad,:pais)"
                )
                ->execute(
                        array(
                            ':ciudad' => $ciudad,
                            ':pais' => $pais
                ));
                
    }
}

?>
