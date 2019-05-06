<?php
require_once '../DAO/producto/DAOProducto.php';

/**
 * Clase Para Realizar Busquedas En El Controlador
 */
class busquedasController {
    
    function busquedaGlobal($cadena){
        //Limpiar Cadena
        $cadena =Util::limpiarCaracateres($cadena);
        //Llamo A La Base De Datos Para Obtener Los Registros
         $daoProducto = new DaoProducto();
         
    }
}