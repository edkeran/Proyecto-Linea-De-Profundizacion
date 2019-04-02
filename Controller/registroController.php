<?php 
require_once ('../DAO/conexion/Conexion.php');
require_once ('../DAO/usuario/DaoUser.php');
require_once ('../Entidades/Usuario.php');
require_once ('../Utilitarios/Util.php');

/**
 * Controlador Para Manejar La Logica Del Registro
 */
class registroController{
    function registrar(){
        //Se Obtienen Las Variables Enviadas Por El Formulario
         $nombre = $_POST['nombre'];
         $correo = $_POST['correo'];
         $contrasena = $_POST['password'];
         $confirmarContrasena = $_POST['confirmPass'];
         $apellido = $_POST['apellido'];
         $nombreUsuario= $_POST['nmUsr'];
         //Se Validan Las Credenciales Ingresadas
         if ($contrasena = $confirmarContrasena){
            
            $nuevoUsuario = new Usuario();
            $nuevoUsuario->setNombre($nombre);
            $nuevoUsuario->setApellido($apellido);
            $contrasena = Util::encriptarPassword($contrasena);
            $nuevoUsuario->setPass($contrasena);
            $nuevoUsuario->setEmail($correo);
            $nuevoUsuario->setUsrName($nombreUsuario);
            $daoUsuario = new DaoUser();
            $daoUsuario->create($nuevoUsuario);
         }
    }

    

}

?>