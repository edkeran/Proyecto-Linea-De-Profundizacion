<?php
require_once 'BaseController/BaseController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/DAO/producto/DAOProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Entidades/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Utilitarios/Util.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Entidades/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Utilitarios/Buildings.php';
require_once 'fileController.php';

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
        //Prueba Para La Creacion De La Imagen Del Producto En El Aplicativo
        if (isset($_FILES['archivo'])) {
            $producto = $this->handleCrearProducto();
            $fileContoll = new fileController();
            $nameProdu = $fileContoll->cargarImagenProducto();
            if ($nameProdu != null) {
                $producto->setImagen($nameProdu);
                $dbProducto = new DaoProducto();
                $dbProducto->create($producto);
                header('Location:../View/web/admin/pages/VendedorPages/VendedorDashboard.php');
            }
        } else {
            echo "No Ha realizado El Cargue Del Archivo";
        }
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
        } catch (Exception $e) {
            header("Location: " . $_SERVER['DOCUMENT_ROOT'] . "/proyecto/View/web/ErrorPages/404.html");
        }
    }

    /**
     * Funcion Para Cargar La Pagina Para Editar Un Producto
     *
     * @param [type] $idProd
     * @return void
     */
    public function editProductoPage($idProd)
    {
        $producto = $this->obtenerProductoSingle($idProd);
        return parent::view('admin/pages/VendedorPages/EditProducto.php', $producto);
    }

    /**
     * Metodo Para Obtener Un Producto
     */
    public function obtenerProductoSingle($idProducto)
    {

        $dbProducto = new DaoProducto();
        $queryRes = $dbProducto->readById($idProducto);
        $arr = pg_fetch_all($queryRes);
        if ($arr) {
            $data = pg_fetch_assoc($queryRes, 0);
            $producto = Buildings::construirProducto($data);
            return $producto;
        } else {
            return null;
        }
    }

    /**
     * Metodo Para Cargar Pagina De Confirmacion Para La Eliminacion Del Producto
     *
     * @param [type] $idProducto
     * @return void
     */
    public function deleteProductPage($idProducto)
    {
        return parent::view('admin/pages/VendedorPages/DeleteProducto.php', $this->obtenerProductoSingle($idProducto));
    }

    /**
     * Funcion Para Eliminar Un Producto Tenga En Cuenta Que Lo Que Se Hace es una desactivacion 
     * y no una eliminacion completa de la base de datos
     *
     * @return void
     */
    public function deleteProducto($idProducto)
    {
        $dbProducto = new DaoProducto();
        $dbProducto->delete($idProducto);
        return parent::View('admin/pages/VendedorPages/VendedorDashboard.php', null);
    }

    /**
     * Metodo Para Obtener La Lista De Productos
     */
    public function obtenerProductoList()
    {
        $dbProducto = new DaoProducto();
        $data = $dbProducto->readListaDeProductos();
        $listaDeProductos = Buildings::constriurProductoLista($data);
        return $listaDeProductos;
    }

    /**
     * Metodo Para Obtener Los Productos Destacados
     *
     * @return array
     */
    public function obtenerProductosDestacados()
    {
        $lstProductos = $this->obtenerProductoList();
        $listFinal = array();
        for ($i = 0; $i < sizeof($lstProductos); $i++) {
            $numeroAleatorio = rand(0, sizeof($lstProductos) - 1);
            if ($this->validarElemento($listFinal, $lstProductos[$numeroAleatorio])) {
                array_push($listFinal, $lstProductos[$numeroAleatorio]);
            } else {
                $i--;
            }
            if ($i == 8) {
                break;
            }
        }
        return $listFinal;
    }

    /**
     * Funcion Para Realizar La Busqueda Del Producto Indicado
     *
     * @param String $data
     * @return void
     */
    public function buscar($data)
    {
        $dbProducto = new DaoProducto();
        $dataResult = $dbProducto->readByString($data);
        $listFinal = array();
        $lstProductos = Buildings::constriurProductoLista($dataResult);
        for ($i = 0; $i < sizeof($lstProductos); $i++) {
            array_push($listFinal, $lstProductos[$i]);
        }
        return parent::view("searchView.php",$listFinal);
    }

    /**
     * Funcion Para Validar Que Elemento A Insertar No Exista En El Arreglo
     *
     * @return void
     */
    private function validarElemento($array, $element)
    {
        foreach ($array as $valor) {
            if ($valor == $element) {
                return false;
            }
        }
        return true;
    }
}
