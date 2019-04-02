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

    }
    
}

?>