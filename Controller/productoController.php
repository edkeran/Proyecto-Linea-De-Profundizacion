<?php
include_once 'BaseController/BaseController.php';
include_once '../DAO/producto/DAOProducto.php';
include_once '../Entidades/Producto.php';
include_once '../Utilitarios/Util.php';
include_once '../Entidades/Usuario.php';

class productoController extends BaseController
{

    //Metodo Para Obtener Los Valores Enviados Por POST
    private function handleCrearProducto()
    {
        $producto = new Producto();
        $producto->setNombre(htmlspecialchars($_POST['nameProd']));
        $producto->setDescripcion(htmlspecialchars($_POST['descripcion']));
        $producto->setCategoria(htmlspecialchars($_POST['categoria']));
        $producto->setPrecio(htmlspecialchars($_POST['price']));
        $producto->setCantidad(htmlspecialchars($_POST['quantity']));
        session_start();
        if (isset($_SESSION['Usuario'])) {
            $idVendedor = $_SESSION['Usuario']->getIdUsuario();
            $producto->setIdVendedor($idVendedor);
        }
        return $producto;
    }

    /**
     * Metodo Para Crear Un Producto
     */
    public function crearProducto()
    {
        $producto = $this->handleCrearProducto();
        $dbProducto = new DaoProducto();
        $dbProducto->create($producto);
        header('Location:../View/web/admin/pages/VendedorPages/VendedorDashboard.php');
    }

    /**
     * Metodo Para Editar Un Producto
     */
    public function editarProducto()
    {
        try {
            $prod = $this->obtenerProductoSingle(htmlspecialchars($_POST['idProducto']));
            $prod->setCantidad(htmlspecialchars($_POST['quantity']));
            $prod->setNombre(htmlspecialchars($_POST['nameProd']));
            $prod->setDescripcion(htmlspecialchars($_POST['descripcion']));
            $prod->setPrecio(htmlspecialchars($_POST['price']));
            $prod->setCategoria(htmlspecialchars($_POST['categoria']));
            $daoProducto = new DaoProducto();
            $daoProducto->edit($prod);
            session_start();
            //Redirecciono Al DashBoard Del Vendedor
            header('location: ../View/web/' . Util::validarRol($_SESSION['Usuario']->getRol()));

         }catch(Exception $e){
            header("Location: ".$_SERVER['DOCUMENT_ROOT']."/proyecto/View/web/ErrorPages/404.html");
         }
    }

    /**
     * Metodo Para Eliminar Un Producto
     */
    public function eliminarProducto(){ }

    /**
     * Funcion Para Cargar La Pagina Para Editar Un Producto
     *
     * @param [type] $idProd
     * @return void
     */
    public function editProductoPage($idProd){
        $producto = $this->obtenerProductoSingle($idProd);
        return parent::view('admin/pages/VendedorPages/EditProducto.php',$producto);
    }

    /**
     * Metodo Para Obtener Un Producto
     */
    private function obtenerProductoSingle($idProducto){
        $dbProducto = new DaoProducto();
        $queryRes = $dbProducto->readById($idProducto);
        $data = pg_fetch_assoc( $queryRes,0);
        $producto = Buildings::construirProducto($data);
        return $producto;
    }

    /**
     * Metodo Para Cargar Pagina De Confirmacion Para La Eliminacion Del Producto
     *
     * @param [type] $idProducto
     * @return void
     */
    public function deleteProductPage($idProducto){
        return parent::view('admin/pages/VendedorPages/DeleteProducto.php',$this->obtenerProductoSingle($idProducto));
    }

    /**
     * Funcion Para Eliminar Un Producto Tenga En Cuenta Que Lo Que Se Hace es una desactivacion 
     * y no una eliminacion completa de la base de datos
     *
     * @return void
     */
    public function deleteProducto($idProducto){
        $dbProducto = new DaoProducto();
        $dbProducto->delete($idProducto);
        return parent::View('admin/pages/VendedorPages/VendedorDashboard.php',null);
    }

    /**
     * Metodo Para Obtener La Lista De Productos
     */
    //TODO: Traer Productos Para Pagina Principal
    public function obtenerProductoList(){ 

    }


}
