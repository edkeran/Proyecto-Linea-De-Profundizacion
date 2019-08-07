<?php

/**
 * Clase Para La Gestion De Los Archivos Del Aplicativo
 */
class fileController
{
    /**
     * Funcion Para Realizar El Cargue De La Imagen Del Producto En El Aplicativo
     *
     * @return void
     */
    public function cargarImagenProducto()
    {
        $isUpload = true;
        $nombre=$_FILES['archivo']['name'];
        $name = explode('.',$nombre);
        $nombre = rand().time().".".$name[1];
        $guardado=$_FILES['archivo']['tmp_name'];
        
        if(!file_exists('../ImagenesCargadas')){
            mkdir('../ImagenesCargadas', 0777, true);
            if (file_exists('../ImagenesCargadas')) {
                if(move_uploaded_file($guardado, '../ImagenesCargadas/'.$nombre)){
                    echo "Archivo guardado con exito";        
                }else{
                    echo "Archivo NO guardado";
                    $isUpload = false;
                }
            }
        }else{
            if(move_uploaded_file($guardado, '../ImagenesCargadas/'.$nombre)){
                echo "Archivo guardado con exito";
            }else{
                echo "Archivo NO guardado";
                $isUpload = false;
            }
        }
        if($isUpload){
            return $nombre;
        }else{
            return null;
        }
    }
}
