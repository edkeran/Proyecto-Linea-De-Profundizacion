<?php 
    include_once '../Entidades/Usuario.php';
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
            return password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
        }

        //Funcion Para Validar La Contraseña
        public static function validarPassword($passIngeresada, $hash){
            //Se retorna segun la validacion de la funcion 
            return password_verify($passIngeresada,$hash);
        }

        //Funcion Para Limpiar Los Caracteres Ingresados En Las Cajas De Texto < >
        public static function limpiarCaracateres($msg){
            $cadenaLimpia = str_replace("<","&lt;",$msg);
            $cadenaLimpia = str_replace(">","&gt;",$cadenaLimpia);
            return $cadenaLimpia;
        }

        //Funcion Para Construir El Objeto Del Usuario
        public static function construirUsuario($usr){
            
        }
        
    }

?>