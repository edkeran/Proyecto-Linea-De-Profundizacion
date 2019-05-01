<?php
require_once __DIR__.'/../conexion/Conexion.php';
/**
 * Clase Para Realizar Todas Las Consultas Relacionadas A Las Categorias Disponibles
 */

class DaoCategoria extends Conexion{

    //Funcion Para Crear Una Nueva Categoria
    function create(){
        
    }

    //Funcion Para Editar Una Categoria
    function edit(){

    }

    //Funcion Para Eliminar Una Categoria
    function delete(){

    }

    //Funcion Para Traer Todas Las Categorias Disponibles
    function read(){
        $conn = parent::getConexion();
        $query = 'SELECT * FROM usuario.categoria';  
        $result = pg_query($conn, $query);
        $arr = pg_fetch_all($result);
        return $arr;
    }
    
}