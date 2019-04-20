<?php

/**
 * Clase Encargada De Manejar La Conexion Con La Base De Datos
 */
class Conexion {
    //Constantes Para La Conexion Con La Base De Datos
    protected CONST usr ="postgres";
    protected CONST pass="1234";
    protected CONST hst = "localhost";
    protected CONST dbnmbr = "shopland";
    function getConexion(){
        try{
            $conexion = pg_connect("user = ".$this::usr." ".
                        "password = ".$this::pass." ".
                        "host = ".$this::hst." ".
                        "dbname = ".$this::dbnmbr)
                        or die("Hay Ocurrido Un Error Al Conectar Con La Base De Datos :".pg_last_error());
            return $conexion;
        }catch(Exception $e){
            throw $e;
        }
    }
}