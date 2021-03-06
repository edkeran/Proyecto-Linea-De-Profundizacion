<?php
include_once 'Layout/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/DAO/categoria/DaoCategoria.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/DAO/producto/DAOProducto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Utilitarios/ManageSession.php';

//Valido Que El Vendedor Tenga Una Session Abierta
$utilSession = new ManageSession();
$utilSession->validarRolUsuario(2);

$dbCat = new DaoCategoria();
$categorias = $dbCat->read();
//Limpio Variable Para Asegurarme De Que No Accedan A La DB
$dbCat = null;
//Obtengo Los Productos Disponibles En La Base De Datos Para La Tabla
$dbProducto = new DaoProducto();
$productos = $dbProducto->read($usuario->getIdUsuario());
//Limpio La Variable De La DB
$dbProducto = null;
?>
<?php if($usuario->getRol() == 2):?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Formulario Para Crear Un Nuevo Producto</h2>
        </div>
        <!-- Advanced Select -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Crear Producto
                            <small> Publicalo Hoy Mismo</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form action="../../../../../HandleRequest/routes?ruta=producto.crear" id="frmProducto" method="post" enctype="multipart/form-data">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p>
                                        <b>Nombre Del Producto</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Nombra Tu Producto" name="nameProd" minlength="7" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Categorias Disponibles</b>
                                    </p>
                                    <select class="form-control show-tick" name="categoria" required>
                                        <?php foreach ($categorias as $categoria) {
                                            echo " <option value=" . $categoria['id'] . ">" . $categoria['descripcion'] . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p>
                                        <b>Precio Del Producto</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" required placeholder="Precio" name="price" min="5000">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Unidades Disponibles</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" required placeholder="Cantidad" name="quantity" min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <p>
                                        <b>Descripción Del Producto</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" required placeholder="Ingresa Una Descripcion Del Producto..." maxlength="450" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <p>
                                        <b>Imagen Del Producto</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="archivo" accept="image/png, .jpeg, .jpg, image/gif" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center"><button type="submit" class="btn btn-primary m-t-15 waves-effect">Crear</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Select -->

        <!--TABLA DEL VENDEDOR PARA COMPROBAR LOS PRODUCTOS DISPONIBLES EN EL APLICATIVO-->
        <!-- Tabla Productos -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Mis Productos Registrados
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Nombre Producto</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Cantidad Disponible</th>
                                        <th>Editar Producto</th>
                                        <th>Eliminar Producto</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre Producto</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Cantidad Disponible</th>
                                        <th>Editar Producto</th>
                                        <th>Eliminar Producto</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($productos as $producto) : ?>
                                        <tr>
                                            <td><?php echo $producto['nombre']; ?></td>
                                            <td><?php echo $producto['descripcion']; ?></td>
                                            <td><?php echo $producto['precio']; ?></td>
                                            <td><?php echo $producto['cantidad']; ?></td>
                                            <td style="text-align:center;">
                                                <form action="/proyecto/HandleRequest/routes?ruta=producto.editarPage" method="post">
                                                    <input type="hidden" value=<?php echo $producto['id']; ?> name="idProducto" />
                                                    <button class="btn bg-orange btn-circle waves-effect waves-circle waves-float" type="submit">
                                                        <i class="material-icons">mode_edit</i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td style="text-align:center;">
                                                <form action="/proyecto/HandleRequest/routes?ruta=producto.eliminarPage" method="post">
                                                    <input type="hidden" value=<?php echo $producto['id']; ?> name="idProducto" />
                                                    <button type="submit" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Tabla -->
        <!--FIN TABLA-->
    </div>
</section>
<?php endif;?>

<?php include_once 'Layout/footer.php'; ?>