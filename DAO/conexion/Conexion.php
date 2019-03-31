<?php

/**
 * Clase Encargada De Manejar La Conexion Con La Base De Datos
 */
class Conexion {
    //Constantes Para La Conexion Con La Base De Datos
    private CONST usr ="postgres";
    private CONST pass="1234";
    private CONST hst = "localhost";
    private CONST dbnmbr = "shopland";
    function getConexion(){
        try{
            $conexion = pg_connect("user = ".usr." ".
                        "password = ".pass." ".
                        "host = ".hst." ".
                        "dbname = ".dbnmbr)
                        or die("Hay Ocurrido Un Error Al Conectar Con La Base De Datos :".pg_last_error());
            return $conexion;
        }catch(Exception $e){
            throw $e;
        }
    }
}
?>