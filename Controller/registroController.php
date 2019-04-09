<?php 
require_once ('../DAO/conexion/Conexion.php');
require_once ('../DAO/usuario/DaoUser.php');
require_once ('../Entidades/Usuario.php');
require_once ('../Utilitarios/Util.php');

/**
 * Controlador Para Manejar La Logica Del Registro
 */
class registroController{

    /**
     * Funcion Para Crear Un Nuevo Usuario En La Base De Datos
     */
    public function registrar(){
        //Se Obtienen Las Variables Enviadas Por El Formulario
         $nombre = $_POST['nombre'];
         $correo = $_POST['correo'];
         $contrasena = $_POST['password'];
         $confirmarContrasena = $_POST['confirmPass'];
         $apellido = $_POST['apellido'];
         $nombreUsuario= $_POST['nmUsr'];
         //Se Validan Las Credenciales Ingresadas
         if ($contrasena = $confirmarContrasena){
            //Se Instancia Un Objeto Tipo Usuario
            $nuevoUsuario = new Usuario();
            //Se Le Setean Sus Parametros
            $nuevoUsuario->setNombre($nombre);
            $nuevoUsuario->setApellido($apellido);
            $contrasena = Util::encriptarPassword($contrasena);
            $nuevoUsuario->setPass($contrasena);
            $nuevoUsuario->setEmail($correo);
            $nuevoUsuario->setUsrName($nombreUsuario);
            $daoUsuario = new DaoUser();
            //Se Crea El Usuario En La Base De Datos 
            $daoUsuario->create($nuevoUsuario);
            header("Location: ../View/web/index.php");
         }
    }

    /**
     * Funcion Para El Logging Del Usuario
     */
    public function loginUsuario(){
        //Instancio Un Objeto Tipo Usuario
        $usuario = new Usuario();
        $usuario->setNombre($_POST['usr']);
        $usuario->setPass($_POST['pswd']);

        if ($this->getPassdb($usuario)){
            //Usuario Valido
            $daoUser = new DaoUser();
            $usuario = $daoUser->read($usuario);

        }else{
            //Mensaje De Error Retornado
        }
    }


    /**
     *Metodo Para Obtener La Contraseña Encriptada Y Asi Realizar Su Respectiva Validacion
     */
    private function getPassdb(Usuario $user){
        $daoUsuario  = new DaoUser();
        $hash = $daoUsuario->getHashPass($user);
        return  (Util::validarPassword($user->getPass(),$hash));
    }
    

}

?>