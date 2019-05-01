<?php 
require_once('../Entidades/Usuario.php');
require_once('../Entidades/Rol.php');

/**
 * Clase Para Realizar La Respectiva Construccion De Las Entidades De La Base De Datos
 * Aqui Van Los Mapeos De Las Entidades A Nivel General 
 */

class Buildings{
    //Funcion Para Construir El Objeto Del Usuario
    public function construirUsuario($usr){
        $usuario = new Usuario();
        $usuario->setApellido($usr['nombre']);
        $usuario->setNombre($usr['apellido']);
        $usuario->setUsrName($usr['usr_loggin']);
        $usuario->setEmail($usr['email']);
        $usuario->setRol($usr['rol']);
        return $usuario;
    }

    //Funcion Para Construir Un Objeto De Rol
    public Static function construirRol($role){
        $rol = new Rol();
        $rol->setId($role['id']);
        $rol->setDescripcion($role['descripcion']);
        return rol;
    }


}