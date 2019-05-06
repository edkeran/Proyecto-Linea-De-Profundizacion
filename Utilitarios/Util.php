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
            return password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
        }

        //Funcion Para Validar La Contraseña
        public static function validarPassword($passIngeresada, $hash){
            //Se retorna segun la validacion de la funcion 
            return password_verify($passIngeresada,$hash);
        }

        //Funcion Para Limpiar Los Caracteres Ingresados En Las Cajas De Texto < >
        //IMPORTANTE USARLA
        public static function limpiarCaracateres($msg){
            $cadenaLimpia = str_replace("<","&lt;",$msg);
            $cadenaLimpia = str_replace(">","&gt;",$cadenaLimpia);
            return $cadenaLimpia;
        }

        //Funcion Para Validar El Rol Del Usuario
        public static function validarRol($rol){
            switch ($rol){
                case 1:
                    //ADMINISTRADOR
                    return '';
                case 2:
                    //VENDEDOR
                    return '';
                case 3:
                    //CLIENTE
                    return 'index';

            }

        }

        /**
         * Metodo Para Redireccionar a una pagina de error PHP
         */
        public static function paginaError(){
            header("Location: ../View/errorPages/index");
        }
        
    }
