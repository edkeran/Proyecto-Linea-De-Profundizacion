<?php
    class Usuario{
        private $nombre;
        private $apellido;
        private $pass;
        private $email;
        private $usrName;

        /**
         * Getters y Setters
         */
        public function getNombre(){
            return $this->$nombre;
        }

        public function getApellido(){
            return $this->$apellido;
        }

        public function getPass(){
            return $this->$pass;
        }

        public function getEmail(){
            return $this->$email;
        }

        public function getUsrName(){
            return $this->$usrName;
        }

        public function setNombre($nombre){
             $this->$nombre = $nombre;
        }

        public function setApellido($apellido){
            $this->$apellido = $apellido;
        }

        public function setPass($pass){
             $this->$pass = $pass;
        }

        public function setEmail($emal){
             $this->$email;
        }

        public function setUsrName($usrName){
             $this->$usrName = $usrName;
        }
    }

?>