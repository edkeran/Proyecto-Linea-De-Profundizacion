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

    //Funcion Para Editar Un Producto
    function edit(){

    }

    //Funcion Para Eliminar Un Producto
    function delete(){

    }

    //Funcion Para Traer Todos Los Productos
    function read($idVendedor){
        $conn = parent::getConexion();
        $query = 'SELECT * FROM usuario.producto WHERE id_vendedor = $1';
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
    
}