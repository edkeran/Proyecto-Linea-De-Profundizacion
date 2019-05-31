<?php
require_once __DIR__.'/../conexion/Conexion.php';
require_once __DIR__.'/../../Entidades/Producto.php';
require_once __DIR__.'/../../Entidades/Categoria.php';


/**
 * Clase Para Realizar Todas Las Consultas Relacionadas A Los Productos Disponibles De La Aplicacion
 */
class DaoProducto extends Conexion{
    //Funcion Para Crear Un Nuevo Producto
    function create(Producto $producto){
        try{
            $conn = parent::getConexion();
            $query = "INSERT INTO usuario.producto (nombre,descripcion,id_vendedor,id_categoria,precio,cantidad) 
            VALUES($1,$2,$3,$4,$5,$6)";
            $result = pg_query_params($conn,$query,array($producto->getNombre(), $producto->getDescripcion(),
            $producto->getIdVendedor(),$producto->getCategoria(),
            $producto->getPrecio(),$producto->getCantidad())) 
            or die("Ha Ocurrido Un Error Inesperado En PHP");
        }catch(Exception $e){
            throw $e;
        }

    }

    /**
     * Funcion Para Editar Un Producto
     *
     * @param [type] $produc
     * @return void
     */
    function edit(Producto $produc){
        $conn = parent::getConexion();
        $sql = 'UPDATE usuario.producto SET nombre = $1, descripcion = $2, id_categoria = $3, precio = $4, cantidad = $5
        WHERE usuario.producto.id = $6';
        $result = pg_query_params($conn,$sql,array($produc->getNombre(),$produc->getDescripcion(),
        $produc->getCategoria(),$produc->getPrecio(),$produc->getCantidad(),$produc->getId())) 
        or die("Ha Ocurrido Un Error Insperado");
    }

    /**
     * Funcion Para Eliminar Un Producto
     *
     * @param int $idProducto
     * @return void
     */
    function delete($idProducto){
        $conn = parent::getConexion();
        $sql = 'UPDATE usuario.producto SET activo = FALSE WHERE id = $1';
        $result = pg_query_params($conn,$sql,array($idProducto)) or 
        die("Ha Ocurrido Un Error Inesperado");
    }

    //Funcion Para Traer Todos Los Productos Activos
    function read($idVendedor){
        $conn = parent::getConexion();
        $query = 'SELECT * FROM usuario.producto WHERE id_vendedor = $1 AND activo';
        $result =pg_query_params($conn,$query,array($idVendedor));
        $datos = array();
        while($row = pg_fetch_assoc($result)){
            array_push($datos,$row);
        }
        return $datos;
    }

    //Funcion Para Traer Los Productos Segun El Criterio De Busqueda
    function readByString($busqueda){
        $conn = parent::getConexion();
        $query = 'SELECT * FROM usuario.producto WHERE nombre LIKE %$1% OR descripcion LIKE%$2%';
        $result = pg_query_params($conn,$query,array($busqueda, $busqueda));
        //Retorno La Lista De Los Elementos
        return sizeof($result[0])>0 ? $result[0] : false;
    }

    //Metodo Para Obtener Un Producto A Partir Del ID Del Producto
    function readById($idProd){
        $conn = parent::getConexion();
        $query = 'SELECT * FROM usuario.producto WHERE id = $1';
        $result = pg_query_params($conn,$query,array($idProd));
        return $result;
    }
    
}