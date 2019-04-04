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
            return password_hash($password,PASSWORD_DEFAULT,['cost'=>20]);
        }

        //Funcion Para Validar La Contraseña
        public static function validarPassword($passIngeresada, $hash){
            //Se retorna segun la validacion de la funcion 
            return password_verify($passIngeresada,$hash);
        }
    }

?>