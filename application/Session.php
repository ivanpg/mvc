<?php


class Session
{
    public static function init()
    {
        session_start();
    }
    
    //destruir sesion o variables de sesión enviadas en un array
    public static function destroy($clave = false)
    {
        if($clave){
            if(is_array($clave)){
                for($i = 0; $i < count($clave); $i++){
                    if(isset($_SESSION[$clave[$i]])){
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }
            else{
                if(isset($_SESSION[$clave])){
                    unset($_SESSION[$clave]);
                }
            }
        }
        else{//si no se envia ninguna clave (de una variable en el array SESSION) entonces eliminamos sesión
            session_destroy();
        }
    }
    
    //crearemos variable de sesión
    public static function set($clave, $valor)
    {
        if(!empty($clave))
        $_SESSION[$clave] = $valor;
    }
    
    //obtendremos valor de na variable de sesion si existe
    public static function get($clave)
    {
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }
    
    //controlar si tienes permiso para acceder
    public static function acceso($level)
    {
        if(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
        
        Session::tiempo();
        
        //si el level q necesitamos es mayor al level actual del usuario
        if(Session::getLevel($level) > Session::getLevel(Session::get('level'))){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
    }
    
    //restringuir acceso en la parte de la vista.
    public static function accesoView($level)
    {
        if(!Session::get('autenticado')){
            return false;
        }
        
        if(Session::getLevel($level) > Session::getLevel(Session::get('level'))){
            return false;
        }
        
        return true;
    }
    
    //devuelve nivel de acceso dependiendo del tipo de usuario autenticado
    public static function getLevel($level)
    {
        $role['admin'] = 3;
        $role['especial'] = 2;
        $role['usuario'] = 1;
        
        if(!array_key_exists($level, $role)){
            throw new Exception('Error de acceso');
        }
        else{
            return $role[$level];
        }
    }
    
    //dar permiso a ciertos grupos especificos independientemente de que sean sup o inf en la jerarquia
    //$level grupo de usuarios a los que se les otorgar acceso y por lo tanto solo ellos podran acceder
    //$noAdmin bloquear acceso al grupo admin
    public static function accesoEstricto(array $level, $noAdmin = false)
    {
        if(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'error/access/5050');
            exit;
        }
        
        Session::tiempo();
        
        if($noAdmin == false){
            //si somos administrador y es permitido ($noAdmin==false)
            //podremos acceder ya si no se dice lo contrario el admin tiene todos los permisos
            if(Session::get('level') == 'admin'){
                return;
            }
        }
        
        
        if(count($level)){
            //si estmos dentro de los grupos que tienen acceso, indicado por array $level
            //saldremos de la función permitiendo el acceso
            if(in_array(Session::get('level'), $level)){
                return;
            }
        }
        
        header('location:' . BASE_URL . 'error/access/5050');
    }
    
    public static function accesoViewEstricto(array $level, $noAdmin = false)
    {
        if(!Session::get('autenticado')){
            return false;
        }
        
        if($noAdmin == false){
            if(Session::get('level') == 'admin'){
                return true;
            }
        }
        
        if(count($level)){
            if(in_array(Session::get('level'), $level)){
                return true;
            }
        }
        
        return false;
    }
    
    public static function tiempo()
    {
        if(!Session::get('tiempo') || !defined('SESSION_TIME')){
            throw new Exception('No se ha definido el tiempo de sesion'); 
        }
        
        //si la variable esta a 0 es que tiempo de sesión indefinido
        if(SESSION_TIME == 0){
            return;
        }
        
        if(time() - Session::get('tiempo') > (SESSION_TIME * 60)){
            Session::destroy();
            header('location:' . BASE_URL . 'error/access/8080');
        }
        /*else{
            //actualizamos el tiempo 
            Session::set('tiempo', time());
        }*/
    }



}

?>