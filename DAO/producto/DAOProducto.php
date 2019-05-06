<?php
require_once __DIR__.'/../conexion/Conexion.php';

/**
 * Clase Para Realizar Todas Las Consultas Relacionadas A Los Productos Disponibles De La Aplicacion
 */
class DaoProducto extends Conexion{

    //Funcion Para Crear Un Nuevo Producto
    function create(){
        
    }

    //Funcion Para Editar Un Producto
    function edit(){

    }

    //Funcion Para Eliminar Un Producto
    function delete(){

    }

    //Funcion Para Traer Todos Los Productos
    function read(){
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