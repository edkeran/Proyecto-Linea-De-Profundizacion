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

    /**
     * Metodo No Estatico Para Validar La Sesion Para Limitar Las Paginas Segun Sea El Caso
     */
    public function validateSession(){
        session_start();
        if(isset($_SESSION['cliente'])){
           echo 'Hola Mundo';
        }else{
            if(isset($_SESSION['vendedor'])){
                echo 'Me Muero';
            }else{
                if(isset($_SESSION['administrador'])){
                    echo 'Averiguo';
                }
            }
        }

    }




 }