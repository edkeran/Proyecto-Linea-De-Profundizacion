<?php 
require_once 'C:\xampp\htdocs\Proyecto\DAO\categoria\DaoCategoria.php';
require_once 'C:\xampp\htdocs\Proyecto\Entidades\Categoria.php';

/**
 * Controlador Para Manejar La Logica Del Las Categorias Del Aplicativo
 */
class categoriasController{
    
    function readCategorias(){
         $cat = new DaoCategoria();
         $datos = $cat->read();
         return $datos;
    }

    function crearCategorias($categoria){
        $dbCat = new DaoCategoria();
        $datos = $dbCat->create($categoria);
    }
}


