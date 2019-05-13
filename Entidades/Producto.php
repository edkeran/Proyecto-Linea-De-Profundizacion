<?php
/**
 * Clase Para Representar La Entidad En La DB Del Objeto Producto
 */
class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $idVendedor;

    
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
        $this->descripcion;
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
}
