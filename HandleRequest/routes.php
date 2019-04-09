<?php 
    require_once ('../Controller/registroController.php');
    $route = $_GET['ruta'];
    // Se Evalua La Ruta Enviada
    $datos = explode(".",$route);
    $ruta = $datos[0];
    $funcion = $datos[1];

    switch ($ruta){
        case ("registrar"):
        llamarFuncionesRegistroController($funcion);
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

?>