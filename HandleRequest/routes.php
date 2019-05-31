<?php
require_once '../Controller/registroController.php';
require_once '../Controller/productoController.php';
require_once '../Controller/vendedorController.php';
require_once '../Utilitarios/ManageSession.php';

function errorHandler($errno, $errstr)
{
    header("Location: " . $_SERVER['DOCUMENT_ROOT'] . "/proyecto/View/web/ErrorPages/404.html");
}

set_error_handler("errorHandler");

$route = $_GET['ruta'];
// Se Evalua La Ruta Enviada
$datos = explode(".", $route);
$ruta = $datos[0];
$funcion = $datos[1];

switch ($ruta) {
    case ("registrar"):
        llamarFuncionesRegistroController($funcion);
        break;
    case ("session"):
        LlamarFuncionesSesion($funcion);
        break;
    case ("producto"):
        llamarFuncionesProducto($funcion);
        break;
    case ("vendedor"):
        llamarFuncionesVendedor($funcion);
        break;
    default:
        header('Location:../View/web/ErrorPages/404.html');
}

/**
 *Funcion que determinar a que funcion debe llamar Del Controlador En Este Caso El RegistroController 
 */
function llamarFuncionesRegistroController($funcion)
{
    $registro = new registroController;
    switch ($funcion) {
        case ("register"):
            $registro->registrar();
            break;
        case ("loginUsuario"):
            $registro->loginUsuario();
            break;
        default:
            header('Location:../View/web/ErrorPages/404.html');
    }
}

/**
 * Metodo Para Llamar A la Clase Que Administra Las Sesiones
 */
function LlamarFuncionesSesion($funcion)
{
    switch ($funcion) {
        case ("LogOut"):
            ManageSession::cerrarSession();
            break;
        default:
            header('Location:../View/web/ErrorPages/404.html');
    }
}

/**
 * Metodo Para Llamar A Las Funciones Asocidadas Al Producto
 */
function llamarFuncionesProducto($funcion)
{
    switch ($funcion) {
        case ("crear"):
            $prodctContr = new productoController();
            $prodctContr->crearProducto();
            break;
        case ("editarPage"):
            $prodctContr = new productoController();
            $prodctContr->editProductoPage($_POST['idProducto']);
            break;
        case ("editar"):
            $prodctContr = new productoController();
            $prodctContr->editarProducto();
            break;
        case ("eliminarPage"):
            $prodctContr = new productoController();
            $prodctContr->deleteProductPage($_POST['idProducto']);
            break;
        case ("delete"):
            $prodctContr = new productoController();
            $prodctContr->deleteProducto($_POST['idProducto']);
            break;
        default:
            header('Location:../View/web/ErrorPages/404.html');
    }
}

//Funcion Para Llamar Los Metodos Del Vendedor Segun Sea El Caso
function llamarFuncionesVendedor($funcion)
{
    switch ($funcion) {
        case ("dashVendedor"):
            header("Location:../View/web/admin/pages/VendedorPages/VendedorDashboard");
            break;
    }
}
