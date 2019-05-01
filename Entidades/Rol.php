<?php
    /**
     * Clase Para Representar La Entidad Rol Para Los Usuarios En La Aplicacion
     */
    class Rol{
        private $id;
        private $descripcion;        

        /*Getters Y Setters*/
        public function getId(){
            return $this->id;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
    }