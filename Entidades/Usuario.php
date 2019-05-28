<?php
    class Usuario{

        private $nombre;
        private $apellido;
        private $pass;
        private $mail;
        private $usrName;
        private $rol;
        private $idUsuario;
        

        /**
         * Getters y Setters
         */
        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function getPass(){
            return $this->pass;
        }

        public function getEmail(){
            return $this->mail;
        }

        public function getUsrName(){
            return $this->usrName;
        }

        public function getRol(){
            return $this->rol;
        }

        public function setNombre($nombre){
             $this->nombre = $nombre;
        }

        public function setApellido($apellido){
            $this->apellido = $apellido;
        }

        public function setPass($pass){
             $this->pass = $pass;
        }

        public function setEmail($email){
             $this->mail = $email;
        }

        public function setUsrName($usrName){
             $this->usrName = $usrName;
        }

        public function setRol($rol){
            $this->rol = $rol;
        }

        public function setIdUsuario($idUser){
            $this->idUsuario = $idUser;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }
        
    }


?>