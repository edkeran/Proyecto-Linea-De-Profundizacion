<?php
/**
 * Clase Para Representar La Entidad En La DB Del Objeto Producto
 */
include_once 'Categoria.php';

class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $idVendedor;
    private $Categoria;
    private $precio;
    private $cantidad;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($idVal)
    {
        $this->id =  $idVal;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($name)
    {
        $this->nombre = $name;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descrip){
        $this->descripcion = $descrip;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($img)
    {
        $this->imagen = $img;
    }

    public function getIdVendedor()
    {
        return $this->idVendedor;
    }

    public function setIdVendedor($idVnd)
    {
        $this->idVendedor =  $idVnd;
    }

    public function getCategoria(){
        return $this->Categoria;
    }

    public function setCategoria($catego){
        $this->Categoria = $catego;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad($canti){
        $this->cantidad = $canti;
    }
}
