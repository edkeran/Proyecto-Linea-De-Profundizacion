<?php
require_once 'C:\xampp\htdocs\Proyecto\DAO\conexion\Conexion.php';
class DaoUser extends Conexion{
    //Funcion Para Crear Un Usuario
    function create(usuario $usr){
        $conn = parent::getConexion();
        $query = 'INSERT INTO usuario.cliente (nombre,apellido,usr_loggin,key_logging,email) VALUES($1,$2,$3,$4,$5)';
        $result = pg_query_params($conn,$query,array($usr->getNombre(),$usr->getApellido(),
        $usr->getUsrName(),$usr->getPass(),$usr->getEmail()));
    }

    //Funcion Para Editar Un Usuario
    function edit(usuario $usr){

    }

    //Funcion Para Eliminar Un Usuario
    function delete(usuario $usr){

    }

    //Funcion Para Traer Un Usuario
    function read(usuario $usr){
        //Obtengo La Conexion Con La Base De Datos
        $conn = parent::getConexion();
        //Creo La Consulta
        $query = 'SELECT * FROM usuario.cliente WHERE usr_login = $1 ';
        $result = pg_query_params($conn,$query,$usr->getPass());
        print $result;
    }

    //Funcion Para Obtener La Contraseña De La Base De Datos
    function getHashPass(usuario $usr){
        $conn = parent::getConexion();
        $query = 'SELECT key_logging FROM usuario.cliente WHERE usr_login = $1 ';
        $result = pg_query_params($conn,$query,array($usr->getPass()));
        return $result;
    }
    
}

?>