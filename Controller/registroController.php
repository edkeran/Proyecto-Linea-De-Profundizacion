<?php
require_once '../DAO/conexion/Conexion.php';
require_once '../DAO/usuario/DaoUser.php';
require_once '../Entidades/Usuario.php';
require_once '../Utilitarios/Util.php';
require_once '../Utilitarios/Buildings.php';
require_once 'BaseController/BaseController.php';

/**
 * Controlador Para Manejar La Logica Del Registro
 */
class registroController extends BaseController
{

    /**
     * Funcion Para Crear Un Nuevo Usuario En La Base De Datos
     */
    public function registrar()
    {
        //Se Obtienen Las Variables Enviadas Por El Formulario
        $nombre =  htmlspecialchars($_POST['nombre']);
        $correo = htmlspecialchars($_POST['correo']);
        $contrasena = htmlspecialchars($_POST['password']);
        $confirmarContrasena = htmlspecialchars($_POST['confirmPass']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $nombreUsuario = htmlspecialchars($_POST['nmUsr']);
        try {
            $rol = $this->validarRol($_POST['rol']);
        } catch (Exception $ex) {
            throw ex;
        }
        //Se Validan Las Credenciales Ingresadas
        if ($contrasena = $confirmarContrasena) {
            //Se Instancia Un Objeto Tipo Usuario
            $nuevoUsuario = new Usuario();
            //Se Le Setean Sus Parametros
            $nuevoUsuario->setNombre($nombre);
            $nuevoUsuario->setApellido($apellido);
            $contrasena = Util::encriptarPassword($contrasena);
            $nuevoUsuario->setPass($contrasena);
            $nuevoUsuario->setEmail($correo);
            $nuevoUsuario->setUsrName($nombreUsuario);
            $nuevoUsuario->setRol($rol);
            $daoUsuario = new DaoUser();
            //Se Valida Que El Correo Y El Nombre Del Usuario Sean Validos
            if ($daoUsuario->validarDatos($nuevoUsuario)) {
                //Se Crea El Usuario En La Base De Datos 
                $daoUsuario->create($nuevoUsuario);
                //Mensaje De Creacion Exitosa
                session_start();
                $_SESSION['msg'] = 'Su Perfil Se Ha Creado Exitosamente';
            } else {
                //Mensaje De Error
                session_start();
                $_SESSION['msg'] = 'El Email o Nombre De Usuario Ingresados Ya Existen En El Aplicativo';
            }
            //Redirecciono A La Pagina Principal De La Aplicacion
            header("Location: ../View/web/index");
        }
    }

    /**
     * Funcion Para Validar Que El Rol Ingresado Sea Valido Segun El Formulario Seleccionado
     */
    private function validarRol($rol)
    {
        if ($rol != null) {
            if ($rol == 2) {
                $rolDef = $rol;
            } else {
                throw ex;
            }
        } else {
            $rolDef = 3;
        }
        return $rolDef;
    }

    /**
     * Funcion Para El Loging Del Usuario
     */
    public function loginUsuario()
    {
        //Instancio Un Objeto Tipo Usuario
        $usuario = new Usuario();
        $usuario->setUsrName($_POST['usr']);
        $usuario->setPass($_POST['pswd']);

        if ($this->getPassdb($usuario)) {

            //Usuario Valido
            $daoUser = new DaoUser();
            $usuario = $daoUser->read($usuario);
            $ensamblador = new Buildings();
            $usuario = $ensamblador->construirUsuario($usuario);
            //Si El Usuario Es Valido, Verifico Su Rol Para Redireccionarlo a Su Respectiva Pagina
            session_start();
            $_SESSION['Usuario'] = $usuario;
            header('location: ../View/web/' . Util::validarRol($usuario->getRol()));
        } else {
            //Mensaje De Error Retornado En La Pantalla Principal Del Usuario
            session_start();
            $_SESSION['Invalid'] = "Las Credenciales Ingresadas En El Loggin Son Invalidas Intente Nuevamente";
            header('Location: ../View/web/index');
        }
    }

    /**
     *Metodo Para Obtener La Contraseña Encriptada Y Asi Realizar Su Respectiva Validacion
     */
    private function getPassdb(Usuario $user)
    {
        $daoUsuario  = new DaoUser();
        $hash = $daoUsuario->getHashPass($user);
        if ($hash == false) {
            return false;
        } else return (Util::validarPassword($user->getPass(), $hash[0]));
    }    
}
