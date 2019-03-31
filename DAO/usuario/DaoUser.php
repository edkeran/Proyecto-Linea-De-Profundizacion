<?php
require_once '../conexion/conexion.php';
class DaoUser extends conexion{
    //Funcion Para Crear Un Usuario
    function create(usuario $usr){

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

    //Funcion Para Crear La Conexion Con La Base De Datos
    function crearConexion(){
        $db = new Conexion();
    }

}

?>