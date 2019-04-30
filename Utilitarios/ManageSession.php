<?php
 /** 
  * Clase Utilitaria Para Administrar Las Sessiones Del Usuario  
  */
 class ManageSession{
     /**
      * Metodo Para Matar La Session Del Usuario Logueado En El Aplicativo
      */
    public static function cerrarSession(){
        session_start();
        session_destroy();
        header("Location: ../View/web/index.php");
    }

 }