<?php 
include_once 'BaseController/BaseController.php';
include_once '../DAO/producto/DAOProducto.php';
include_once '../Entidades/Producto.php';

class productoController extends BaseController{

    //Metodo Para Obtener Los Valores Enviados Por POST
    private function handleCrearProducto(){
        $producto = new Producto();
        $producto->setNombre(htmlspecialchars($_POST['nameProd']));
        $producto->setDescripcion(htmlspecialchars($_POST['descripcion']));
        $producto->setCategoria(htmlspecialchars($_POST['categoria']));
        $producto->setPrecio(htmlspecialchars($_POST['price']));
        $producto->setCantidad(htmlspecialchars($_POST['quantity']));
        session_start();
        if (isset($_SESSION['Usuario'])){
            $idVendedor = $_SESSION['Usuario']->getIdUsuario();
            $producto->setIdVendedor($idVendedor);
        }
        return $producto;
    }

    /**
     * Metodo Para Crear Un Producto
     */
    public function crearProducto(){
        $producto = $this->handleCrearProducto();
        $dbProducto = new DaoProducto();
        $dbProducto->create($producto);
        header('Location:../View/web/admin/pages/VendedorPages/VendedorDashboard.php');
    }

    /**
     * Metodo Para Editar Un Producto
     */
    public function editarProducto(){

    }

    /**
     * Metodo Para Eliminar Un Producto
     */
    public function eliminarProducto(){

    }

    /**
     * Metodo Para Obtener Un Producto
     */
    public function obtenerProductoSingle(){

    }

    /**
     * Metodo Para Obtener La Lista De Productos
     */
    public function obtenerProductoList(){

    }
}






