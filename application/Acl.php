<?php

class Acl {

    //objeto de la base de datos
    private $_db;
    //id de usuario al cual se le va a aplicar la lista de acceso
    private $_id;
    //role con el cual estamos trabajando
    private $_role;
    //permisos ya procesados
    private $_permisos;

    public function __construct($id = false) {
        if ($id) {
            $this->_id = (int) $id;
        } else {
            if (Session::get('id_usuario')) {
                $this->_id = Session::get('id_usuario');
            } else {
                $this->_id = 0;
            }
        }

        $this->_db = new Database();
        $this->_role = $this->getRole();
        $this->_permisos = $this->getPermisosRole();
        $this->compilarAcl();
    }

    //Combina los elementos de uno o más arrays juntándolos de modo que los valores de uno se anexan al final del anterior. 
    //Si los arrays de entrada tienen las mismas claves de string, entonces el valor más posterior para esa clave sobrescribirá a la anterior
    //por lo tanto si coinciden las claves de los dos arrays se van a quedar los valores del array de usuario.
    //Como los permisos de rol/categoria pueden ser diferentes a los de usuario. Ej: Un usuario aunq sea de una categoria (con unos permisos determinados)
    //puede tener desabilitados ciertos permisos (con valor 0). Asi con el merge se fusionaran los arrays y si el array de permisos usuario
    //tiene alguna restricción sobre algun permiso concreto de rol/categoria, será la q prevalecerá. Con el merge de claves iguales y por lo tanto del mismo
    //permiso se quedarán los valores del ultimo array. Q en este caso es el array de permisos de usuario
    public function compilarAcl() {
        $this->_permisos = array_merge(
                $this->_permisos, $this->getPermisosUsuario()
        );
    }

    public function getRole() {
        $role = $this->_db->query(
                "select role from usuarios " .
                "where id = {$this->_id}"
        );

        $role = $role->fetch();
        return $role['role'];
    }

    //permisos (id's de permisos) que estan asignados a ese role del usuario actual
    public function getPermisosRoleId() {
        $ids = $this->_db->query(
                "select permiso from permisos_role " .
                "where role = '{$this->_role}'"
        );

        $ids = $ids->fetchAll(PDO::FETCH_ASSOC);
        $id = array();

        for ($i = 0; $i < count($ids); $i++) {
            $id[] = $ids[$i]['permiso'];
        }

        return $id;
    }

    //devuelve los permisos del rol ya procesados. Estos son los permisos de rol/categoria
    //especificados. Son los que Actuarán si los de usuario no dice lo contrario.
    public function getPermisosRole() {
        $permisos = $this->_db->query(
                "select * from permisos_role " .
                "where role = '{$this->_role}'"
        );

        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        $data = array();

        for ($i = 0; $i < count($permisos); $i++) {
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            if ($key == '') {
                continue;
            }

            if ($permisos[$i]['valor'] == 1) {
                $v = true;
            } else {
                $v = false;
            }

            $data[$key] = array(
                'key' => $key,
                'permiso' => $this->getPermisoNombre($permisos[$i]['permiso']),
                'valor' => $v,
                'heredado' => true,
                'id' => $permisos[$i]['permiso']
            );
        }

        return $data;
    }

    public function getPermisoKey($permisoID) {
        $permisoID = (int) $permisoID;

        $key = $this->_db->query(
                "select `key` from permisos " .
                "where id_permiso = {$permisoID}"
        );

        $key = $key->fetch();
        return $key['key'];
    }

    public function getPermisoNombre($permisoID) {
        $permisoID = (int) $permisoID;

        $key = $this->_db->query(
                "select `permiso` from permisos " .
                "where id_permiso = {$permisoID}"
        );

        $key = $key->fetch();
        return $key['permiso'];
    }

    //estos son los permisos especificos para el usuario. Pueden ser diferentes
    // a los de su categoria de rol.
    public function getPermisosUsuario() {
        //todos los ids de permisos para el usuario
        $ids = $this->getPermisosRoleId();

        if (count($ids)) {
            $permisos = $this->_db->query(
                    "select * from permisos_usuario " .
                    "where usuario = {$this->_id} " .
                    "and permiso in (" . implode(",", $ids) . ")"
            );

            $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $permisos = array();
        }


        $data = array();

        for ($i = 0; $i < count($permisos); $i++) {
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            if ($key == '') {
                continue;
            }

            if ($permisos[$i]['valor'] == 1) {
                $v = true;
            } else {
                $v = false;
            }

            $data[$key] = array(
                'key' => $key,
                'permiso' => $this->getPermisoNombre($permisos[$i]['permiso']),
                'valor' => $v,
                'heredado' => false,
                'id' => $permisos[$i]['permiso']
            );
        }

        return $data;
    }

    public function getPermisos() {
        if (isset($this->_permisos) && count($this->_permisos))
            return $this->_permisos;
    }

    //para saber si tenemos el permiso determinado por la $key
    public function permiso($key) {
        if (array_key_exists($key, $this->_permisos)) {
            if ($this->_permisos[$key]['valor'] == true || $this->_permisos[$key]['valor'] == 1) {
                return true;
            }
        }

        return false;
    }

    //Comprobamo si tenemos permiso para acceder
    public function acceso($key) {
         Session::tiempo();

        if ($this->permiso($key)) {
            return;
        }

        header("location:" . BASE_URL . "error/access/5050");
        exit;
    }

}

?>
