<?php 
    /**
     * Clase Utilitarias Con Funciones Extras
     */
    class Util{
        //Constructor De La Clase 
        function __construct(){

        }

        //Funcion Para Encriptar La Contraseña
        public static function encriptarPassword($password){
            //Usamos El PasswordHash Que Nos Proporciona PHP
            return password_hash($password,PASSWORD_DEFAULT,['cost'=>10]);
        }

    }

?>