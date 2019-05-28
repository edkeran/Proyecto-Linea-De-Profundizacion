<?php 
    require_once '../Controller/registroController.php';
    require_once '../Controller/productoController.php';
    require_once '../Utilitarios/ManageSession.php';
    $route = $_GET['ruta'];
    // Se Evalua La Ruta Enviada
    $datos = explode(".",$route);
    $ruta = $datos[0];
    $funcion = $datos[1];

    switch ($ruta){
        case ("registrar"):
        llamarFuncionesRegistroController($funcion);
        case ("session"):
        LlamarFuncionesSesion($funcion);
        break;
        case ("producto"):
            llamarFuncionesProducto($funcion);
        break;
    }

    /**
    *Funcion que determinar a que funcion debe llamar Del Controlador En Este Caso El RegistroController 
    */
    function llamarFuncionesRegistroController($funcion){
        $registro = new registroController;
        switch($funcion){
            case ("register"):
                $registro->registrar();
            break;
            case ("loginUsuario"):
                $registro->loginUsuario();
            break;
        }
    }

    /**
     * Metodo Para Llamar A la Clase Que Administra Las Sesiones
     */
    function LlamarFuncionesSesion($funcion){
        switch($funcion){
            case ("LogOut"):
                ManageSession::cerrarSession();
            break;
        }
    }

    /**
     * Metodo Para Llamar A Las Funciones Asocidadas Al Producto
     */
    function llamarFuncionesProducto($funcion){
        switch($funcion){
            case ("crear"):
               $prodctContr = new productoController ();
               $prodctContr->crearProducto();
            break;
        }
    }
