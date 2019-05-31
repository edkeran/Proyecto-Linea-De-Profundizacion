<?php
include_once 'Layout/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/Entidades/Producto.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/DAO/categoria/DaoCategoria.php';

$dbCat = new DaoCategoria();
$categorias = $dbCat->read();
//Limpio Variable Para Asegurarme De Que No Accedan A La DB
$dbCat = null;
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Formulario Para Editar El Producto Seleccionado</h2>
        </div>
        <!-- Advanced Select -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Editar Producto
                            <small> Realiza Los Cambios Que Necesites</small>
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
                    <form action="../../../proyecto/HandleRequest/routes?ruta=producto.editar" id="frmProducto" method="post">
                        <input type="hidden" name="idProducto" value=<?php echo $this->datosVista->getId() ?> />
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <p>
                                        <b>Nombre Del Producto</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required placeholder="Nombra Tu Producto" name="nameProd" value=<?php echo $this->datosVista->getNombre(); ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Categorias Disponibles</b>
                                    </p>
                                    <select class="form-control show-tick" name="categoria" required>
                                        <?php foreach ($categorias as $categoria) {
                                            $selected = $categoria['id'] == $this->datosVista->getCategoria() ? "selected='selected'" : "";
                                            echo " <option value=" . $categoria['id'] . " " . $selected . ">" . $categoria['descripcion'] . "</option>";
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
                                            <input type="number" class="form-control" required placeholder="Precio" name="price" min="5000" value=<?php echo $this->datosVista->getPrecio() ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Unidades Disponibles</b>
                                    </p>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" required placeholder="Cantidad" name="quantity" min="1" value=<?php echo $this->datosVista->getCantidad() ?>>
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
                                            <textarea rows="4" class="form-control no-resize" required placeholder="Ingresa Una Descripcion Del Producto..." maxlength="500" name="descripcion"><?php echo $this->datosVista->getDescripcion() ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center"><button type="submit" class="btn btn-primary m-t-15 waves-effect">Editar</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Select -->

    </div>
</section>

<?php include_once 'Layout/footer.php'; ?>