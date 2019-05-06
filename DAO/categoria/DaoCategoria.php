<?php
require_once __DIR__.'/../conexion/Conexion.php';

/**
 * Clase Para Realizar Todas Las Consultas Relacionadas A Las Categorias Disponibles
 */
class DaoCategoria extends Conexion{

    //Funcion Para Crear Una Nueva Categoria
    function create(Categoria $categoria){
        $conn = parent::getConexion();
        $query = 'INSERT INTO usuario.categoria (descripcion) VALUES($1)';
        pg_query_params($conn, $query, array($categoria->getDescripcion()));
    }

    //Funcion Para Editar Una Categoria
    function edit(Categoria $categoria){
        $conn = parent::getConexion();
        //$query = 'UPDATE ';

    }

    //Funcion Para Eliminar Una Categoria
    function delete(Categoria $categoria){

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