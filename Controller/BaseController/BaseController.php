<?php

/**
 * Clase Encargada De Retornar Una Vista En Especifico Con Los Datos Seteados En La Misma
 */
class BaseController{

    public $rutaViews;
    public $datosVista;

    function __construct(){
        $this->rutaViews = __DIR__.'/../../View/web/';
    }

    /**
     * Funcion Para Retornar A Una Vista Con Cualquier Dato Sin Tener Que Almacenarlo En Session
     *
     * @param String $View
     * @param Object $datos
     * @return void
     */
    function view($View, $datos){
        $this->datosVista = $datos;
        require_once $this->rutaViews.$View;
    }

}