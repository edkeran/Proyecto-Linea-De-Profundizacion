<?php
/**
 * Entidad De Las Categorias Creadas En La Aplicacion
 */
    class Categoria{
        private $idCategoria;
        private $descripcion;
        
        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getIdCategoria(){
            return $this->getIdCategoria;
        }

        public function setDescripcion($descrip){
            $this->descripcion = $descrip;
        }

        public function setIdCategoria($idCat){
            $this->idCategoria = $idCat;
        }


    }

?>