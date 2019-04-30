<?php
require_once __DIR__.'/../conexion/Conexion.php';

/**
 * Clase Para Realizar Todas Las Consultas Relacionadas Al Perfil De Usuario
 */
class DaoUser extends Conexion{

    //Funcion Para Crear Un Usuario
    function create(usuario $usr){
        $conn = parent::getConexion();
        $query = 'INSERT INTO usuario.cliente (nombre,apellido,usr_loggin,key_logging,email,rol) VALUES($1,$2,$3,$4,$5,$6)';
        $result = pg_query_params($conn,$query,array($usr->getNombre(),$usr->getApellido(),
        $usr->getUsrName(),$usr->getPass(),$usr->getEmail(),$usr->getRol()));
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
        $query = 'SELECT * FROM usuario.cliente WHERE usr_loggin = $1';
        $result = pg_query_params($conn,$query,array($usr->getUsrName()));
        return pg_fetch_assoc($result);
    }

    //Funcion Para Obtener La Contraseña De La Base De Datos
    function getHashPass(usuario $usr){
        $conn = parent::getConexion();
        $query = 'SELECT key_logging FROM usuario.cliente WHERE usr_loggin = $1 ';
        $result = pg_query_params($conn,$query,array($usr->getUsrName()))
            or die(pg_last_error());
        $arr=pg_fetch_all($result,PGSQL_NUM);
        // Se Valida Segun El Tipo De Retorno El Dato dskfndsjkf
        return sizeof($arr[0])>0 ? $arr[0] : false;
    }

    //Funcion para Validar Que El Usuario y El Email Sean Unicos
    function validarDatos(usuario $usr){
        $conn = parent::getConexion();
        $query = 'SELECT 1 FROM usuario.cliente WHERE usr_loggin = $1 OR email = $2 ';
        $result = pg_query_params($conn,$query,array($usr->getUsrName(),$usr->getEmail()))
        or die(pg_last_error());
        $arr = pg_fetch_all($result,PGSQL_NUM); 
        return $arr == false ? true : false;
    }
    
}

?>