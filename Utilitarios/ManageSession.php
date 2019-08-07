<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyecto/Entidades/Usuario.php';

/** 
 * Clase Utilitaria Para Administrar Las Sessiones Del Usuario  
 */
class ManageSession
{
    /**
     * Metodo Para Matar La Session Del Usuario Logueado En El Aplicativo
     */
    public static function cerrarSession()
    {
        session_start();
        session_destroy();
        header("Location: ../View/web/index");
    }

    /**
     * Metodo Para Validar El Usuario Segun Su Pantalla
     *
     * @return void
     */
    public function validarRolUsuario($rol)
    {
        if (isset($_SESSION['Usuario'])) {
            $usuario = $_SESSION['Usuario'];
            if (!$usuario->getRol() == $rol) {
                //Redireccionar Pagina Error 404
                session_destroy();
                header('Location:/proyecto/View/web/ErrorPages/404.html');
            }
        } else {
            header('Location:/proyecto/View/web/ErrorPages/404.html');
        }
    }
}
